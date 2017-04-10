<?php

namespace App\Http\Controllers;
use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Category;
use App\Tutorial;
use App\SubmissionTutorial;
use App\EventTutorial;

class TutorialController extends Controller
{
    public function index($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			$tutorials = Tutorial::where('eventtutorial_id',$id)->get();
			$event = EventTutorial::find($id);
			$categories = Category::get();
			return view('admin.tutorial.question.manage',compact('tutorials','event', 'categories'));
		}
		elseif (Auth::user()->role->id == 3) {
			date_default_timezone_set('Asia/Jakarta'); // CDT
			$current_date = date("Y-m-d H:i:s", time());
			$this->data = array();
			$this->data['eve'] = EventTutorial::find($id);
			$this->data['judul'] = Tutorial::select('id','judul')->where('eventtutorial_id','=',$id)->get();
			$this->data['question'] = Tutorial::where('eventtutorial_id','=',$id)->get();
			if($this->data['eve']->waktu_mulai < $current_date && $this->data['eve']->waktu_akhir < $current_date || $current_date < $this->data['eve']->waktu_mulai )
			{
				return redirect('tutorial');
			}
			return view('user.tutorial.question.manage',$this->data);
		}
		else{
			return redirect('/');
		}
	}

	public function create($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			$categories = Category::get();
			$event = EventTutorial::find($id);
			if (Request::isMethod('get')) {
				return View::make('admin.tutorial.question.create',compact('categories','event'));
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Tutorial::create(array(
					'eventtutorial_id'	=> $id,
					'category_id' 		=> $data['category'],
					'judul' 			=> $data['judul'], 
					'konten' 			=> $data['konten'], 
					'jawaban' 			=> $data['jawaban']
				));
				return redirect('tutorial/questions/manage/'.$id);
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function update($id1,$id2) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$event = EventTutorial::find($id1);
				$tutorial = Tutorial::find($id2);
				$categories = Category::get();
				return View::make('admin.tutorial.question.update',compact('event','tutorial','categories'));
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Tutorial::where('id',$id2)->update(array(
					'category_id' 	=> $data['category'],
					'judul' 		=> $data['judul'], 
					'konten' 		=> $data['konten'], 
					'jawaban' 		=> $data['jawaban']
				));
				return redirect('tutorial/questions/manage/'.$id1);
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function destroy($id1,$id2) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			Tutorial::where('id', $id2)->delete();
			SubmissionTutorial::where('tutorial_id',$id2)->delete();
			return redirect('tutorial/questions/manage/'.$id1);
		} 
		else {
			return redirect('/');
		}
	}

	public function submit($id1,$id2) {
		$data = Input::all();
		$jawaban = '';
		for ($i=0;$i<=$data['jumlah'];$i++)
		{
			if (isset($data['jawaban'.$i]))
			{
				$jawaban = $data['jawaban'.$i];
				break;
			}
		}
		SubmissionTutorial::create(array(
				'tutorial_id' 	=> $id2,
				'users_id' 		=> Auth::user()->id,
				'nilai' 		=> '0', 
				'jawaban' 		=> $jawaban, 
				'status' 		=> "0"
		));
		return redirect('tutorial/manage/'.$id1);
	}
}
