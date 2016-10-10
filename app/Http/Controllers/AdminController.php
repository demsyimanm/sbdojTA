<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Request;
use Auth;
use Input;
use App\Event;
use App\User;
use App\Question;
use App\Submission;
use Helper;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		date_default_timezone_set('Asia/Jakarta'); // CDT
		$current_date = date('Y-m-d H:i:s');

		if (Auth::user()->role->id == 1) {
			$this->data['nearest'] = Event::where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}

		else if (Auth::user()->role->id == 2) {
			$kelas = Auth::user()->kelas;
			$this->data['nearest'] = Event::where('kelas','=',$kelas)->where('waktu_mulai','>=',$current_date)->min('waktu_mulai');
		}
		$this->data['event'] = Event::where('waktu_mulai','=',$this->data['nearest'])->get();
		$this->data['nearest'] = date('m/d/Y H:i:s', strtotime($this->data['nearest']));
		return view('admin.HomeAdmin',$this->data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function scoreboards(){
		if (Auth::user()->role->id == 1) {
			if (Request::isMethod('get')) {
				# code...
				$this->data['event'] = Event::get();
				return view('admin.scoreboard.index',$this->data);
			} 
			else {
				$id = Input::get('event');
				return redirect('scoreboards/'.$id);
			}
		}
		else if (Auth::user()->role->id == 2) {
			if (Request::isMethod('get')) {
				$kelas = Auth::user()->kelas;
				$this->data['event'] = Event::where('kelas','=',$kelas)->get();
				return view('admin.scoreboard.index',$this->data);
			} 
			else {
				$id = Input::get('event');
				return redirect('scoreboards/'.$id);
			}
		}

		else
		{
			if (Request::isMethod('get')) {
				# code...
				$kelas = Auth::user()->kelas;
				$this->data['event'] = Event::where('kelas','=',$kelas)->get();
				return view('user.scoreboard.index',$this->data);
			} 
			else {
				$id = Input::get('event');
				return redirect('scoreboards/'.$id);
			}
		}
	}

	/*public function scoreboardsUser()
	{
		if (Request::isMethod('get')) {
			# code...
			$kelas = Auth::user()->kelas;
			$this->data['event'] = Event::where('kelas','=',$kelas)->get();
			return view('admin.scoreboard.index',$this->data);
		} else {
			$id = Input::get('event');
			return redirect('user/scoreboard/'.$id);
		}
	}*/


	public function scoreboardView($id) {
		$event = Event::find($id);
		$nilai = array();
		$user = User::where('kelas',$event->kelas)->where('role_id', 3)->orderBy('id','desc')->get();
		$question = Question::where('event_id', $id)->get();
		if (!$question->count()) {
			foreach ($user as $use) {
				$nilai[$use->username]['nrp'] = (string)$use->username;
			}
		}
		else {
			foreach ($question as $quest) {
				$submission = Submission::where('question_id',$quest->id)->get();
				if (!$submission->count()){
					foreach ($user as $use) {
						$nilai[$use->username]['nrp'] = (string)$use->username;
					}
				}
				else {
					foreach ($submission as $sub) {
						foreach ($user as $use) {
							$nilai[$use->username]['nrp'] = (string)$use->username;
							$nilai[$use->username][$sub->question_id] = 0;
						}
					}
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
				if ($val != (string)$key ) {
					$nilai[$key]['total'] += $val;
				}
			}
			$nilai[$key]['total'] = (string)$nilai[$key]['total'];
		}
        foreach ($nilai as $key => $row) {
		    $total[$key]  = $row['total'];
		    $nrp[$key] = $row['nrp'];
		}

		array_multisort($total, SORT_DESC, $nrp, SORT_ASC, $nilai);		
		$this->data['question'] = $question;
		$this->data['user'] = $user;
		$this->data['nilai'] = $nilai;
		$this->data['id'] = $id;
		$this->data['event'] = $event;
		if (Auth::user()->role->id == 1 or Auth::user()->role->id == 2) {
			return view('admin.scoreboard.scoreboard',$this->data);
		}
		if (Auth::user()->role->id == 3) {
			return view('user.scoreboard.scoreboard',$this->data);
		}
	}

	/*public function calendar() {
		return view ('admin.CalendarAdmin');
	}*/

	public function refresh($id) {
		if (Request::isMethod('get')) {
            if (Request::ajax()) {
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
                return json_encode($nilai);
            }
        }
	}
}
