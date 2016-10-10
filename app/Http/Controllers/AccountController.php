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
				return redirect('account');
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

}
