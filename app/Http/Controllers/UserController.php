<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use Auth;
use Input;
use App\Event;
use App\User;
use App\Question;
use App\Submission;

class UserController extends Controller {
	public function index() {
		date_default_timezone_set('Asia/Jakarta'); 
		$current_date = date('Y-m-d H:i:s');
		$kelas = Auth::user()->kelas;
		$this->data['nearest'] = Event::where('kelas','=',$kelas)->where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		$this->data['event'] = Event::where('waktu_mulai','=',$this->data['nearest'])->get();
		$this->data['nearest'] = date('m/d/Y H:i:s', strtotime($this->data['nearest']));
		return view('user.HomeUser',$this->data);
	}

	public function scoreboards() {
		if (Request::isMethod('get')) {
			$kelas = Auth::user()->kelas;
			$this->data['event'] = Event::where('kelas','=',$kelas)->get();
			return view('user.scoreboard.index',$this->data);
		} 
		else {
			$id = Input::get('event');
			return redirect('user/scoreboard/'.$id);
		}
	}

	public function scoreboardsUser() {
		if (Request::isMethod('get')) {
			$kelas = Auth::user()->kelas;
			$this->data['event'] = Event::where('kelas','=',$kelas)->get();
			return view('user.scoreboard.index',$this->data);
		} else {
			$id = Input::get('event');
			return redirect('user/scoreboard/'.$id);
		}
	}

	public function scoreboard($id) {
		$event = Event::find($id);
		$nilai = array();
		$user = User::where('kelas',$event->kelas)->where('role_id', 3)->get();
		$question = Question::where('event_id', $id)->get();
		foreach ($question as $quest) {
			$submission = Submission::where('question_id',$quest->id)->get();
			foreach ($submission as $sub) {
				foreach ($user as $use) {
					$nilai[$use->username][$sub->question_id] = 0;
				}
			}
		}
		foreach ($question as $quest) {
			foreach ($user as $use) {
				$submission = Submission::where('question_id',$quest->id)->where('users_id',$use->id)->max('nilai');
				if($submission) $nilai[$use->username][$quest->id] = $submission;
				else $nilai[$use->username][$quest->id] = 0;
			}
		}
		foreach ($nilai as $key => $value) {
			$nilai[$key]['total'] = 0;
			foreach ($value as $val) {
				$nilai[$key]['total'] += $val;
			}
		}
		$this->data['question'] = $question;
		$this->data['user'] = $user;
		$this->data['nilai'] = $nilai;
		$this->data['id'] = $id;
		$this->data['event'] = $event;
		return view('user.scoreboard.board',$this->data);
	}
}
