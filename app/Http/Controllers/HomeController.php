<?php 
namespace App\Http\Controllers;
use Auth;
use Request;
use Input;

class HomeController extends Controller {
	protected $data = array();
    public function index() {   
        $this->data['username'] = "";
        $this->data['password'] = "";
        if(Auth::check()) {
            $this->data['username'] = Auth::user()->username;
            $this->data['password'] = Auth::user()->password;
        }
        return view('admin.home',$this->data);
    }

    public function login() {
        if (Request::isMethod('post')) {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            if (Auth::attempt($credentials,true)){
                if(Auth::user()->role_id == 1) {
					return redirect('assistant'); 
				} 
                else if (Auth::user()->role_id == 2) {
					return redirect('assistant'); 
				} 
                else if (Auth::user()->role_id == 3) {
					return redirect('user'); 
				}
            }
            return view('login');
        }
        else if (Request::isMethod('get')) {
            if (Auth::check()) {
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

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function assistant() {
        return view('admin.homeAdmin');
    }

    public function user() {
        return view('user.homeUser');
    }
}
