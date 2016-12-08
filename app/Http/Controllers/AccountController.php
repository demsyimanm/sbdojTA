<?php 
namespace App\Http\Controllers;

use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Submission;
use App\Http\Controllers\Controller;
use Session;
use File;
use DB;
use Excel;
use Mail;
use Hash;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		if(Auth::user()->role->id == 1) {
			$this->data['users'] = User::get();
			return view('admin.account.manage', $this->data);
		}
		else if(Auth::user()->role->id == 2) {
			$this->data['users'] = User::where('kelas',Auth::user()->kelas)->where('role_id','!=','1')->get();
			return view('admin.account.manage', $this->data);
		}
		return redirect('/');
	}

	public function create() {
		if(Auth::user()->role->id == 1) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['kelas'] = Auth::user()->kelas;
				$this->data['user'] = Auth::user()->role->id;
				$this->data['role'] = Role::get();
				return View::make('admin.account.create', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				User::insertGetId(array(
					'nama' 		=> $data['nama'], 
					'username' 	=> $data['username'], 
					'password' 	=> bcrypt($data['password']), 
					'kelas' 	=> $data['kelas'], 
					'role_id' 	=> $data['role_id']
				));
				return redirect('accounts');
			}
		} 
		else if(Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['kelas'] = Auth::user()->kelas;
				$this->data['user'] = Auth::user()->role->id;
				$this->data['role'] = Role::where('id','!=','1')->get();
				return View::make('admin.account.create', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				User::insertGetId(array(
					'nama' 		=> $data['nama'], 
					'username' 	=> $data['username'], 
					'password' 	=> bcrypt($data['password']), 
					'kelas' 	=> $data['kelas'], 
					'role_id' 	=> $data['role_id']
				));
				return redirect('accounts');
			}
		}
		else {
			return redirect('/');
		}
	}

	public function update($id) {
		if(Auth::user()->role->id == 1) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['user'] = User::find($id);
				$this->data['role'] = Role::get();
				return View::make('admin.account.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				User::where('id', $id)->update(array(
					'nama' 		=> $data['nama'], 
					'username' 	=> $data['username'],					
					'kelas' 	=> $data['kelas'], 
					'role_id' 	=> $data['role_id']
				));
				return redirect('accounts');
			}
		} 
		else if( Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['user'] = User::find($id);
				$this->data['role'] = Role::where('id','!=','1')->get();
				return View::make('admin.account.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				User::where('id', $id)->update(array(
					'nama' 		=> $data['nama'], 
					'username' 	=> $data['username'], 	
					'role_id' 	=> $data['role_id']
				));
				return redirect('accounts');
			}
		}
		else {
			return redirect('/');
		}
	}

	public function destroy($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
				User::where('id', $id)->delete();
				Submission::where('users_id',$id)->delete();
				return redirect('accounts');
		} 
		else {
			return redirect('/');
		}
	}

	public function upload()
    {   
        if(Request::isMethod('post'))
        {
        	if (Auth::check())
            {
	        	ini_set("upload_max_filesize","300M");
		    	ini_set("post_max_size","300M");
		    	set_time_limit(10800);
				
		    	$input = Input::all();

				if ($_FILES["praktikan"]["error"] > 0)
				{
				  echo "Error: " . $_FILES["praktikan"]["error"] . "<br />";
				}
				else
				{
					$praktikan = array_get($input,'praktikan');
		            $fileName_praktikan = $praktikan->getClientOriginalName();
		            $upload_success = $praktikan->move("upload", $fileName_praktikan);
		            $data = Excel::load('upload/'.$fileName_praktikan, function($reader){
		            	$temp = $reader->toObject();
		            	$temp->each(function($data) {

		            		$cek = User::where('username', $data->nrp)->count();
		            		if ($cek > 0)
		            		{
		            			User::where('username',$data->nrp)->update(array(
		            				'nama'		=> $data->nama,
									'kelas'		=> $data->kelas,
									'password'	=> bcrypt($data->nrp)
		            			));
		            		}
		            		else
		            		{
						    	User::insertGetId(array(
						    		'username'	=> $data->nrp,
			                        'nama'		=> $data->nama,
									'kelas'		=> $data->kelas,
									'password'	=> bcrypt($data->nrp),
									'role_id'	=> 3
			                    ));
		            		}

						});
						DB::commit();

		            });
		            Session::flash('status','success');
					return redirect('accounts');
				}
            	return redirect('login');
			}
        }
    }

    public function resetPassword()
    {   
        if(Request::isMethod('post'))
        {
        	$data = Input::all();
        	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < 6; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
        	$kode = $randomString;
        	//$data['nrp'] = '5114100034';
        	$cek = User::where('username',$data['nrp'])->count();
        	if($cek > 0)
        	{
	        	$user = User::where('username',$data['nrp'])->first();
	        	if($user->role_id != 3)
	        	{
	        		Session::flash('status','dont-have-right');
					return redirect('/');
	        	}
	        	User::where('username',$data['nrp'])->update(array(
	        		'kode'		=> $kode,
	        		'status'	=> 1
	        	));
	        	/*$title = "Password Reset ".$user->username." - ".$user->nama;
	        	Mail::send('resetPassword.resetPassword',['nama'=> $title,'kode'=>$kode,'user'=>$user->username,'namaUser'=>$user->nama], function ($message) use ($title,$user,$kode){
	        		$message->from('demsyiman@gmail.com','Permintaan Reset Password');
	        		$message->to($user->email)->subject('Permintaan Reset Password NRP '. $user->username);
	        	});*/
	            /*Session::flash('status','success');
				return redirect('foo');*/

				echo "sukses";
				return redirect('reset/password/verification');
        	}
        	else
        	{
        		Session::flash('status','not-exist');
				return redirect('/');
        	}
        }
        else
        {
        	return redirect('/');
        }
    }

    public function verification()
    {   
        if(Request::isMethod('post'))
        {
        	$data = Input::all();
        	//dd($data);
        	$user = User::where('username',$data['username'])->first();
        	$cek = User::where('username',$data['username'])->count();
        	if ($cek > 0)
        	{
        		if ($user->role_id == 3)
        		{
		        	if ($user->status == 1)
		        	{
		        		if($user->kode == $data['kode'])
		        		{
		        			User::where('username',$data['username'])->update(array(
		        				'password'		=> bcrypt($data['password']),
		        				'status'		=> 0,
		        			));
			        		Session::flash('status','success');
							return redirect('/');
		        		}
		        		else
		        		{
		        			Session::flash('status','wrong-code');
							return redirect('/');
		        		}
		        	}
		        	else if($user->status == 0 or $user->status == NULL)
		        	{
		        		Session::flash('status','not-in-state');
						return redirect('/');
		        	}
        		}
        		else
        		{
        			Session::flash('status','dont-have-right');
					return redirect('/');
        		}
        	}
        	else if ($cek == 0)
        	{
        		Session::flash('status','not-exist');
				return redirect('/');
        	}
        }
        else
        {
        	return view('resetPassword.verification');
        }
    }

    public function profile() {
		if(Auth::user()->role->id == 1) {
			if (Request::isMethod('get')) {
				
			} 
			else if (Request::isMethod('post')) {
				
			}
		} 
		else if( Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {

			} 
			else if (Request::isMethod('post')) {

			}
		}
		else if( Auth::user()->role->id == 3) {
			if (Request::isMethod('get')) {
				$user = User::find(Auth::user()->id);
				return View::make('user.profile.profile', compact('user'));
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				User::where('id', Auth::user()->id)->update(array(
					'nama' 		=> $data['nama'],
					'email' 	=> $data['email'], 
				));
				Session::flash('status','profile-success');
				return redirect('profile');
			}
		}
		else {
			return redirect('/');
		}
	}

	public function passwordResetAuth()
    {   
        if(Request::isMethod('post'))
        {
        	$data = Input::all();
        	$user = User::find(Auth::user()->id);
    		if (Hash::check($data['oldPassword'], $user->password))
    		{
    			User::where('id',$user->id)->update(array(
    				'password'		=> bcrypt($data['newPassword']),
    			));
        		Session::flash('status','password-success');
				return redirect('profile');
    		}
    		else
    		{
    			Session::flash('status','wrong-password');
				return redirect('profile');
    		}
        }
        else
        {
        	return view('resetPassword.verification');
        }
    }

}
