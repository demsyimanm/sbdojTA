<?php

namespace App\Http\Controllers;
use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index() {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			$categories = Category::get();
			return view('admin.tutorial.kategori.manage',compact('categories'));
		}
		else{
			return redirect('/');
		}
	}

	public function create() {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { 
			if (Request::isMethod('get')) {
				return view('admin.tutorial.kategori.create');
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$check = Category::where('name', $data['name'])->count();
				if($check > 0)
				{
					Session::flash('status', 'exist');
				}
				else
				{
					Category::create(array(
						'name' 			=> $data['name'], 
						'detail' 		=> $data['detail'] 
					));
				}
				return redirect('tutorial');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function update($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { 
			if (Request::isMethod('get')) {
				$category = Category::find($id);
				return view('admin.tutorial.kategori.update',compact('category'));
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$check = Category::where('name', $data['name'])->count();
				if($check > 0)
				{
					Session::flash('status', 'exist');
				}
				else
				{
					Category::where('id',$id)->update(array(
						'name' 			=> $data['name'], 
						'detail' 		=> $data['detail'] 
					));
				}
				return redirect('tutorial');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function destroy($id)
	{
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
				Category::where('id', $id)->delete();
				return redirect('tutorial');
		} 
		else {
			return redirect('/');
		}
	}

}
