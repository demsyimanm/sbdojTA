<?php namespace App\Http\Controllers;

use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Event;
use App\Question;
use App\Submission;
use App\Http\Controllers\EventController;

class QuestionController extends Controller {
	public function index($id)
	{
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$current_date = date("Y-m-d H:i:s", time());
		$this->data = array();
		$this->data['eve'] = Event::find($id);
		
		$this->data['judul'] = Question::select('id','judul')->where('event_id','=',$id)->get();
		$this->data['question'] = Question::where('event_id','=',$id)->get();
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			return view('admin.event.question.manage',$this->data);
		}
		else if(Auth::user()->role->id == 3) {
			if($this->data['eve']->waktu_mulai < $current_date && $this->data['eve']->waktu_akhir < $current_date || $current_date < $this->data['eve']->waktu_mulai )
			{
				return redirect('events');
			}
			return view('user.event.question.manage',$this->data);
		}

	}

	public function create($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			$this->data = array();
			$this->data['eve'] = Event::find($id);
			if (Request::isMethod('get')) {
				return View::make('admin.event.question.create',$this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Question::create(array(
					'event_id' 	=> $id,
					'judul' 	=> $data['judul'], 
					'konten' 	=> $data['konten'], 
					'jawaban' 	=> $data['jawaban']
				));
				return redirect('questions/'.$id);
			}
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
		Submission::create(array(
				'question_id' 	=> $id2,
				'users_id' 		=> Auth::user()->id,
				'nilai' 		=> '0', 
				'jawaban' 		=> $jawaban, 
				'status' 		=> "0"
		));
		return redirect('questions/'.$id1);
	}

	public function update($id1,$id2) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$this->data = array();
				$this->data['eve'] = Event::find($id1);
				$this->data['quest'] = Question::find($id2);
				return View::make('admin.event.question.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				Question::where('id', $id2)->update(array(
					'judul' => $data['judul'], 
					'konten' => $data['konten'], 
					'jawaban' => $data['jawaban']
				));
				return redirect('questions/'.$id1);
			}
		}
		else {
			return redirect('/');
		}
	}

	public function destroy($id1,$id2) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) {
			Question::where('id', $id2)->delete();
			Submission::where('question_id',$id2)->delete();
			return redirect('questions/'.$id1);
		} 
		else {
			return redirect('/');
		}
	}

}
