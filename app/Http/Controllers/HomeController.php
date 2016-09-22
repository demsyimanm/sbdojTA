<?php 
namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	protected $data = array();
    public function index()
    {   
        $this->data['username'] = "";
        $this->data['password'] = "";
        if(Auth::check())
        {
            $this->data['username'] = Auth::user()->username;
            $this->data['password'] = Auth::user()->password;
        }
        return view('admin.home',$this->data);
    }

    public function login()
    {
        if (Request::isMethod('post'))
        {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            if (Auth::attempt($credentials,true))
            {

                if(Auth::user()->role_id == 1){
					return redirect('assistant'); 
				} else if (Auth::user()->role_id == 2){
					return redirect('assistant'); 

				} else if (Auth::user()->role_id == 3){
					return redirect('user'); 
				}
            }
            return view('login');
        }

        else if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
            	if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2){
                	return redirect('assistant');
                }
                else if (Auth::user()->role_id == 3){
                	return view('user.homeUser');
                }
            }

            return view('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function assistant()
    {
        return view('admin.homeAdmin');
    }

	/*public function index()
	{
		
	}*/


}
