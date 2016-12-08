<?php 
namespace App\sqlParser\src\PHPSQLParser;
/*ini_set('include_path', 'C:\xampp\htdocs');
require_once '/sbdoj/public/assets/plugin/sqlParser/vendor/autoload.php';
require_once ('\sbdoj\public\assets\plugin\sqlParser\src\PHPSQLParser\PHPSQLParser.php');*/
namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use Session;
use App\User;
use PHPSQLParser\PHPSQLParser;

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
        /*$sql = 'select DISTINCT 1+2   c1, 1+ 2 as
        `c2`, sum(c2),sum(c3) as sum_c3,"Status" = CASE
                WHEN quantity > 0 THEN \'in stock\'
                ELSE \'out of stock\'
                END case_statement
        , t4.c1, (select c1+c2 from t1 inner_t1 limit 1) as subquery into @a1, @a2, @a3 from t1 the_t1 left outer join t2 using(c1,c2) join t3 as tX ON tX.c1 = the_t1.c1 join t4 t4_x using(x) where c1 = 1 and c2 in (1,2,3, "apple") and exists ( select 1 from some_other_table another_table where x > 1) and ("zebra" = "orange" or 1 = 1) group by 1, 2 having sum(c2) > 1 ORDER BY 2, c1 DESC LIMIT 0, 10 into outfile "/xyz" FOR UPDATE LOCK IN SHARE MODE';


        $parser = new PHPSQLParser();
        $parsed = $parser->parse($sql, true);
        dd($parse);    */
        if (Request::isMethod('post')) {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            $cek = User::where('username',$this->data['username'] )->count();

            if ($cek > 0)
            {
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
                Session::flash('status','failed-login');
                return redirect('/');
            }
            else
            {
                Session::flash('status','not-exist');
                return redirect('/');
            }
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
