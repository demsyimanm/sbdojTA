<?php
namespace App\Http\Controllers;
use Input;
use View;
use Auth;
use Request;
use App\User;
use App\Event;
use App\Question;
use App\ListDB;
use DateTime;
use App\DBversion;
use App\DBversionParameter;
use Validator;

class DBVersionController extends Controller
{
    public function index() {
		if(Auth::user()->role->id == 2) {
			$this->data['versions'] = DBversion::with('dbversionparameter')->get();
			return view('admin.dbversion.manage', $this->data);
		}
		return redirect('/');
	}

	public function create() {
		if(Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				return View::make('admin.dbversion.create');
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$id = DBversion::insertGetId(array(
					'nama' 		=> $data['nama'], 
					'import' 	=> $data['import'],
				));
				for ($i=1; $i <= $data['sum']; $i++) { 
					if($data['param'.$i] != "" )
					{
						DBversionParameter::create(array(
							'dbversion_id'	=> $id,
							'parameter'		=> $data['param'.$i]
						));
					}
				}

				return redirect('databases/version');
			}
		}
		else {
			return redirect('/');
		}
	}

	public function update($id) {
		if( Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['version'] = DBversion::where('id',$id)->with('dbversionparameter')->first();
				return View::make('admin.dbversion.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();

				$id = DBversion::where('id', $id)->update(array(
					'nama' 		=> $data['nama'], 
					'import' 	=> $data['import'],
				));
				array_forget($data, 'nama');
				array_forget($data, 'import');
				array_forget($data, '_token');
				foreach ($data as $key => $value) {
					if($value != "" )
					{
						DBversionParameter::where('id', $key)->update(array(
							'parameter'		=> $value
						));
					}
				}
				return redirect('databases/version');
			}
		}
		else {
			return redirect('/');
		}
	}

}
