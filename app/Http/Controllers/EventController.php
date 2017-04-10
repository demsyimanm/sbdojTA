<?php 
namespace App\Http\Controllers;

/*use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
*/
use Input;
use View;
use Auth;
use Request;
use App\Role;
use App\User;
use App\Submission;
use App\SubmissionTutorial;
use App\Event;
use App\EventTutorial;
use App\Question;
use App\ListDB;
use DateTime;

class EventController extends Controller {
	public function index() {
		if(Auth::user()->role->id == 1){
			$this->data['event'] = Event::get();
			return view('admin.event.manage',$this->data);
		}
		else if (Auth::user()->role->id == 2 ) {
			$this->data['event'] = Event::where('kelas','=',Auth::user()->kelas)->get();
			return view('admin.event.manage',$this->data);
		}
		elseif (Auth::user()->role->id == 3) {
			$this->data['event'] = Event::where('kelas','=',Auth::user()->kelas)->get();
			return view('user.event.manage',$this->data);		
		}
	}

	public function create() {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { 
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = Auth::user()->kelas;
			$this->data['dbs'] = ListDB::get();
			if (Request::isMethod('get')) {
				return View::make('admin.event.create',$this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				/*$max_id = Event::max('id');
				$max_id += 1;*/
				$temp_tgl_mulai = DateTime::createFromFormat('d/m/Y', $data['tgl_akhir'])->format('Y-m-d');
				$temp_tgl_akhir = DateTime::createFromFormat('d/m/Y', $data['tgl_mulai'])->format('Y-m-d');
				$data['waktu_mulai'] = $temp_tgl_mulai." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $temp_tgl_akhir." ".$data['wkt_akhir'];
				Event::create(array(
					'judul' 		=> $data['judul'], 
					'konten' 		=> $data['konten'], 
					'waktu_mulai' 	=> $data['waktu_mulai'], 
					'waktu_akhir' 	=> $data['waktu_akhir'],
					'kelas' 		=> $data['kelas'],
					'listdb_id' 	=> $data['db'],
				));
				return redirect('events');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function parserStart($id){
		$db = ListDB::find($id);
		if($db->dbversion_id==1)
		{
			$cmd = "python C://xampp/htdocs/sbdoj/grader/grader_oracle.py ".$id." ".$db->db_username." ".$db->db_password." ".$db->ip;
			//dd($cmd);
		}
		else if($db->dbversion_id==2)
		{
			$cmd = "python C://xampp/htdocs/sbdoj/grader/grader_mysql.py ".$id." ".$db->db_username." ".$db->db_password." ".$db->ip." ".$db->db_name;
			//dd($cmd);
		}
		if($process = popen("start /B ".$cmd, "r"))
		{
			ListDB::where('id', $id)->update(array(
				'status' => '1'
			));
			//pclose($process);
			return "true";
		} 
		else
		{
			return "false";
		}
	}

	public function ParserStop($id) {
		exec("Wmic process where (Name like '%python%') get commandline, ProcessId 2>&1",$output);
		if($output[0] == "No Instance(s) Available.")
		{
			return "false";
		}
		else
		{
			$id_arr = array();
            for ($i=1; $i < sizeof($output)-1; $i++) { 
                $status = explode(" ", $output[$i]);
                $temp_cmd = "";
                for ($i=0; $i < sizeof($status); $i++) { 
                	if($status[$i]!="")
                	{
                		$temp_cmd .= $status[$i]."-";
                	}
                }
                if (strpos($status[2], 'grader')!== false)
                { 
                	$split = explode("-", $temp_cmd);
                    $pid = $split[6];
                    $command = $split[1];
                    $grader_id = $split[2];
                    $check = ListDB::find($grader_id);
                    if($id == $grader_id)
					{
						exec("Taskkill /PID ".$pid." /F");
					} 
                } 
            }
            ListDB::where('id', $id)->update(array(
				'status' => '0'
			));
			return "true";
		}
	}

	public function viewSubmissions() {
		if (Auth::user()->role->id == 1) {
			if (Request::isMethod('get')) {
				$this->data['event'] = Event::get();
				$this->data['tutorial'] = EventTutorial::get();
				return view('admin.event.indexSubmission',$this->data);
			} 
			else {
				$id = Input::get('event');
				return redirect('submissions/'.$id);
			}
		}

		else {
			if (Request::isMethod('get')) {
				$kelas = Auth::user()->kelas;
				$this->data['event'] = Event::where('kelas','=',$kelas)->get();
				$this->data['tutorial'] = EventTutorial::where('kelas','=',$kelas)->get();
				return view('admin.event.indexSubmission',$this->data);
			} 
			else {
				$id = Input::get('event');
				return redirect('submissions/'.$id);
			}
		}
	}

	public function viewSubmissionsSubmit($id) {
		$event = Event::find($id);
		$quest_id = Question::select('id')->where('event_id',$id)->get();
		$pertanyaan = array();
		foreach ($quest_id as $key => $value) {
			array_push($pertanyaan, $value->id);
		}
		if(Auth::user()->role_id == 3)
		{
			$submissions = Submission::whereIn('question_id', $pertanyaan)->where('users_id',Auth::user()->id)->get();
			return view('user.event.viewSubmission', compact('submissions', 'event'));
		}
		else if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
		{	
			$submissions = Submission::whereIn('question_id', $pertanyaan)->get();
			return view('admin.event.viewSubmission', compact('submissions', 'event'));
		}
		else
		{
			return redirect('/');
		}
	}

	public function update($id) {
		if(Auth::user()->role->id == 1 ) {
			$this->data = array();
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = "";
			$this->data['eve'] = Event::find($id);
			$this->data['dbs'] = ListDB::get();
			if (Request::isMethod('get')) {
				return View::make('admin.event.update', $this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$temp_tgl_mulai = DateTime::createFromFormat('d/m/Y', $data['tgl_mulai'])->format('Y-m-d');
				$temp_tgl_akhir = DateTime::createFromFormat('d/m/Y', $data['tgl_akhir'])->format('Y-m-d');
				$data['waktu_mulai'] = $temp_tgl_mulai." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $temp_tgl_akhir." ".$data['wkt_akhir'];
				Event::where('id', $id)->update(array(
					'judul' 		=> $data['judul'], 
					'konten' 		=> $data['konten'], 
					'waktu_mulai' 	=> $data['waktu_mulai'], 
					'waktu_akhir' 	=> $data['waktu_akhir'],
					'kelas' 		=> $data['kelas'],
					'listdb_id'		=> $data['db']
				));
				return redirect('events');
			}
		} 
		else if(Auth::user()->role->id == 2) {
			$this->data = array();
			$kelas = Auth::user()->kelas;
			$user = Auth::user()->role->id;
			$even = Event::find($id);
			$dbs = ListDB::get();
			if (Request::isMethod('get')) {
				return View::make('admin.event.update', compact('kelas','user','even','dbs'));
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
				$temp_tgl_mulai = DateTime::createFromFormat('d-m-Y', $data['tgl_mulai'])->format('Y-m-d');
				$temp_tgl_akhir = DateTime::createFromFormat('d-m-Y', $data['tgl_akhir'])->format('Y-m-d');
				$data['waktu_mulai'] = $temp_tgl_mulai." ".$data['wkt_mulai'];
				$data['waktu_akhir'] = $temp_tgl_akhir." ".$data['wkt_akhir'];
				Event::where('id', $id)->update(array(
					'judul' 		=> $data['judul'], 
					'konten' 		=> $data['konten'], 
					'waktu_mulai' 	=> $data['waktu_mulai'], 
					'waktu_akhir' 	=> $data['waktu_akhir'],
					'kelas' 		=> $data['kelas'],
					'listdb_id'		=> $data['db']
				));
				return redirect('events');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function destroy($id)
	{
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
			Event::where('id', $id)->delete();
			/*$quest_id = Question::select('id')->where('event_id',$id)->get();
			$pertanyaan = array();
			foreach ($quest_id as $key => $value) {
				array_push($pertanyaan, $value->id);
			}
			Submission::whereIn('question_id', $pertanyaan)->delete();*/
			Question::where('event_id',$id)->delete();
			return redirect('events');
		} 
		else {
			return redirect('/');
		}
	}

}
