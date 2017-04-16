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
use App\ListDBParameter;
use Validator;

class DatabaseController extends Controller
{
    public function index() {
		if(Auth::user()->role->id == 1 or Auth::user()->role->id == 2 ){
            exec("Wmic process where (Name like '%python%') get commandline, ProcessId 2>&1",$output);
            if($output[0] == "No Instance(s) Available.")
            {
                ListDB::whereNotNull('pdm')->update(array(
                    'status' => '0',
                    'gradertutorial_status' => '0'
                ));
            }
            else
            {
                $id_arr = array();
                $id_arr_tutorial = array();
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
                        $pid = $split[sizeof($split)-2];
                        $command = $split[1];
                        $grader_id = $split[2];
                        $check = ListDB::find($grader_id);
                        if($check->status == 1)
                        {
                            array_push($id_arr, $grader_id);
                        } 
                    } 
                    if (strpos($status[2], 'tutorial')!== false)
                    { 
                        $split = explode("-", $temp_cmd);
                        $pid = $split[6];
                        $command = $split[1];
                        $grader_id = $split[2];
                        $check = ListDB::find($grader_id);
                        if($check->gradertutorial_status == 1)
                        {
                            array_push($id_arr_tutorial, $grader_id);
                        } 
                    } 
                }
                ListDB::whereNotIn('id', $id_arr)->update(array(
                    'status' => '0'
                ));
                ListDB::whereNotIn('id', $id_arr_tutorial)->update(array(
                    'gradertutorial_status' => '0'
                ));
            }
			$dbs = ListDB::with('listdbparameter')->get();
			return view('admin.db.manage',compact('dbs'));
		}
		else{
			return redirect('/');		
		}
	}

	public function create() {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { 
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = Auth::user()->kelas;
			if (Request::isMethod('get')) {
                $this->data['versions'] = DBversion::get();

				return View::make('admin.db.create',$this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
                $fileName   = '';
                if(Input::hasFile('pdm')){
                    $file=Input::file('pdm');
                    $extension = $file->getClientOriginalExtension();
                    if($extension != 'jpeg' && $extension != 'JPEG'&& $extension != 'jpg' && $extension != 'JPG' && $extension != 'png' && $extension != 'PNG')
                    {
                        return redirect('databases/add')->withInput()->withErrors("Gambar PDM Harus berupa file .JPG, .PNG atau .JPEG");
                    }
                    $latest = ListDB::orderBy('id','desc')->first();
                    $latest = $latest->id + 1;
                    $name= $latest.'_pdm';
                    $fileName = $name . '.' . $extension;
                    $file->move(public_path().'/pdm_db',$fileName);
                }
                else
                {
                    return redirect('databases/add')->withInput()->withErrors("Gambar PDM Harus diisi");
                }
				$db_id = ListDB::insertGetId(array(
                    'dbversion_id'                  => $data['dbversion'],
                    'pdm'                           => $fileName,
					'status'		                => 0,
                    'gradertutorial_status'         => 0
				));
                $dbversion = $data['dbversion'];
                array_forget($data,'dbversion');
                array_forget($data,'_token');
                array_forget($data,'pdm');
                foreach ($data as $key => $value) {
                    ListDBParameter::create(array(
                        'listdb_id'             => $db_id,
                        'dbversion_id'          => $dbversion,
                        'dbversionparameter_id' => $key,
                        'content'               => $value
                    ));
                }
                return redirect('databases');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function update($id) {
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { 
			$this->data['user'] = Auth::user()->role->id;
			$this->data['kelas'] = Auth::user()->kelas;
			$this->data['db'] = ListDB::with('listdbparameter')->find($id);
			if (Request::isMethod('get')) {
                //dd($this->data['db']);
                //$this->data['versions'] = DBversion::get();
				return View::make('admin.db.update',$this->data);
			} 
			else if (Request::isMethod('post')) {
				$data = Input::all();
                //dd($data);
                $fileName   = '';
                if(Input::hasFile('pdm')){
                    $file=Input::file('pdm');
                    $extension = $file->getClientOriginalExtension();
                    if($extension != 'jpeg' && $extension != 'JPEG'&& $extension != 'jpg' && $extension != 'JPG' && $extension != 'png' && $extension != 'PNG')
                    {
                        return redirect('databases/edit/'.$id)->withInput()->withErrors("Gambar PDM Harus berupa file .JPG, .PNG atau .JPEG");
                    }
                    $name= $id.'_pdm';
                    $fileName = $name . '.' . $extension;
                    $file->move(public_path().'/pdm_db',$fileName);
                    ListDB::where('id',$id)->update(array(
                        'pdm'  => $fileName,
                    ));
                }
                $dbversion = $data['dbversion'];
                array_forget($data,'dbversion');
                array_forget($data,'dbversion_name');
                array_forget($data,'_token');
                array_forget($data,'pdm');
                foreach ($data as $key => $value) {
                    ListDBParameter::where('listdb_id',$id)->where('dbversion_id',$dbversion)->where('dbversionparameter_id',$key)->update(array(
                        'content'               => $value
                    ));
                }
                return redirect('databases');
			}
		} 
		else {
			return redirect('/');
		}
	}

	public function destroy($id)
	{
		if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
				$events = array();
				$listEvent = Event::where('listdb_id', $id)->get();
				foreach ($listEvent as $key) {
					array_push($events, $key->id);
				}
				//dd($events);
				ListDB::where('id',$id)->delete();
                ListDBParameter::where('listdb_id',$id)->delete();
				Event::where('listdb_id', $id)->delete();
				Question::whereIn('event_id', $events)->delete();
				return redirect('databases');
		} 
		else {
			return redirect('/');
		}
	}

    public function getField($id)
    {
        if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2){
            $fields = DBversionParameter::where('dbversion_id',$id)->get();
            return $fields;
        } 
    }

    /*public function mySql($db_id,$ip,$db_name,$conn_username,$conn_password)
    {
        $temp_file = "grader_".$db_id.".py";
        $file = fopen("grader/grader_".$db_id.".py", "wb") or die("Unable to open file!");
        $content = "#!/usr/bin/python\
import MySQLdb
import cx_Oracle
import time
import sys
try:
    db_kunci= MySQLdb.connect('".$ip."', '".$conn_username."', '".$conn_password."', '".$db_name."')
    cursor_kunci = db_kunci.cursor()
    while True:
        db= MySQLdb.connect('localhost', 'root', '', 'sbd')
        cursor = db.cursor()
    
        try:
            sql = '''select id, question_id, users_id, jawaban,status from submission where status = 0 having id = min(id)'''
            cursor.execute(sql)
            unchecked = cursor.fetchone()
            sub_id = ''
            ques_id = ''
            user_id = ''
            ans = ''
            stat = ''
            tanda = 0

            while unchecked is not None:
                sub_id = unchecked[0]
                ques_id = unchecked[1]
                user_id = unchecked[2]
                ans = unchecked[3]
                stat = unchecked[4]
                unchecked = cursor.fetchone()

            if (sub_id!='') : 
                tanda = 1

            if (tanda==1):
                ans = ans.replace(';', '')
                try:
                    cursor_kunci.execute(ans)
                except:
                    pass
                    #print str(sub_id)+' Failed : '+ str(e) 
                results = cursor_kunci.fetchall()
                num_fields = len(cursor_kunci.description)
                hasil=[[0 for x in range(num_fields)] for x in range(10000)]
                rows=0
                for res in results:
                    for column in range(num_fields):
                        hasil[rows][column] = res[column]
                    rows+=1
        
                kunci = '''select jawaban from question where id='''+ str(ques_id)
                cursor.execute(kunci)
                temp = cursor.fetchone()
                while temp is not None:
                    temp_kunci = temp[0]
                    temp_kunci = temp_kunci.replace(';', '')
                    temp = cursor.fetchone()
                cursor_kunci.execute(temp_kunci)
                res_kunci = cursor_kunci.fetchall()
                num_fields_1 = len(cursor_kunci.description)
                arr_kunci=[[0 for x in range(num_fields_1)] for x in range(10000)]
                row_kunci=0
                for res_key in res_kunci:
                    for column_kunci in range(num_fields_1):
                        arr_kunci[row_kunci][column_kunci] = res_key[column_kunci]
                    row_kunci+=1
                flag=0
                if (num_fields != num_fields_1): 
                   flag=1
                   
                if (rows != row_kunci): 
                   flag=1 
    
                if (flag==0):
                    for row_compare in range(row_kunci):
                        for column_compare in range(num_fields):
                            if (hasil[row_compare][column_compare]!=arr_kunci[row_compare][column_compare]):
                                #print hasil[row_compare][column_compare]
                                #print arr_kunci[row_compare][column_compare]
                                flag=1
                        
                if (flag==1): 
                    update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
                    cursor.execute(update1)
                    db.commit()
                    print 'query '+str(sub_id)+' failed'
    
                elif (flag==0): 
                    update2 = '''update submission set nilai = 100, status = 1 where id = '''+str(sub_id)
                    cursor.execute(update2)
                    db.commit()
                    print 'query '+str(sub_id)+' success'

        #except Exception, e:
        except :
            #print str(sub_id)+' Failed : '+ str(e) + ' '  + str(temp_kunci)
            print 'except '+str(sub_id)
            db.rollback()
            update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
            cursor.execute(update1)
            db.commit()
            
        time.sleep(1)
        db.close()
    db_kunci.close()
except KeyboardInterrupt:
    sys.exit(0)
#except Exception, e:
except :
    #print str(sub_id)+' Outer Failed : '+ str(e) 
    print 'berhenti'";
        fwrite($file, $content);
        fclose($file);
        return;
    }

    public function oracleSql($db_id,$ip,$db_name,$conn_username,$conn_password)
    {
        $temp_file = "grader_".$db_id.".py";
        $file = fopen("grader/grader_".$db_id.".py", "wb") or die("Unable to open file!");
        $content = "#!/usr/bin/python\
import MySQLdb
import cx_Oracle
import time
import sys
try:
    db_kunci = cx_Oracle.connect(user='".$conn_username."', password='".$conn_password."', dsn='".$ip.":1521/xe')
    cursor_kunci = db_kunci.cursor()
    while True:
        db= MySQLdb.connect('localhost', 'root', '', 'sbd')
        cursor = db.cursor()
    
        try:
            sql = '''select id, question_id, users_id, jawaban,status from submission where status = 0 having id = min(id)'''
            cursor.execute(sql)
            unchecked = cursor.fetchone()
            sub_id = ''
            ques_id = ''
            user_id = ''
            ans = ''
            stat = ''
            tanda = 0

            while unchecked is not None:
                sub_id = unchecked[0]
                ques_id = unchecked[1]
                user_id = unchecked[2]
                ans = unchecked[3]
                stat = unchecked[4]
                unchecked = cursor.fetchone()

            if (sub_id!='') : 
                tanda = 1

            if (tanda==1):
                ans = ans.replace(';', '')
                try:
                    cursor_kunci.execute(ans)
                except:
                    pass
                    #print str(sub_id)+' Failed : '+ str(e) 
                results = cursor_kunci.fetchall()
                num_fields = len(cursor_kunci.description)
                hasil=[[0 for x in range(num_fields)] for x in range(10000)]
                rows=0
                for res in results:
                    for column in range(num_fields):
                        hasil[rows][column] = res[column]
                    rows+=1
        
                kunci = '''select jawaban from question where id='''+ str(ques_id)
                cursor.execute(kunci)
                temp = cursor.fetchone()
                while temp is not None:
                    temp_kunci = temp[0]
                    temp_kunci = temp_kunci.replace(';', '')
                    temp = cursor.fetchone()
                cursor_kunci.execute(temp_kunci)
                res_kunci = cursor_kunci.fetchall()
                num_fields_1 = len(cursor_kunci.description)
                arr_kunci=[[0 for x in range(num_fields_1)] for x in range(10000)]
                row_kunci=0
                for res_key in res_kunci:
                    for column_kunci in range(num_fields_1):
                        arr_kunci[row_kunci][column_kunci] = res_key[column_kunci]
                    row_kunci+=1
                flag=0
                if (num_fields != num_fields_1): 
                   flag=1
                   
                if (rows != row_kunci): 
                   flag=1 
    
                if (flag==0):
                    for row_compare in range(row_kunci):
                        for column_compare in range(num_fields):
                            if (hasil[row_compare][column_compare]!=arr_kunci[row_compare][column_compare]):
                                #print hasil[row_compare][column_compare]
                                #print arr_kunci[row_compare][column_compare]
                                flag=1
                        
                if (flag==1): 
                    update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
                    cursor.execute(update1)
                    db.commit()
                    print 'query '+str(sub_id)+' failed'
    
                elif (flag==0): 
                    update2 = '''update submission set nilai = 100, status = 1 where id = '''+str(sub_id)
                    cursor.execute(update2)
                    db.commit()
                    print 'query '+str(sub_id)+' success'

        #except Exception, e:
        except :
            #print str(sub_id)+' Failed : '+ str(e) + ' '  + str(temp_kunci)
            print 'except '+str(sub_id)
            db.rollback()
            update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
            cursor.execute(update1)
            db.commit()
            
        time.sleep(1)
        db.close()
    db_kunci.close()
except KeyboardInterrupt:
    sys.exit(0)
#except Exception, e:
except :
    #print str(sub_id)+' Outer Failed : '+ str(e) 
    print 'berhenti'";
        fwrite($file, $content);
        fclose($file);
        return;
    }
}*/
}