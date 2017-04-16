#!/usr/bin/python\
import MySQLdb
import cx_Oracle
import threading
import time
import sys
import os
import signal

db_kunci = MySQLdb.connect(host='localhost', user='root', db='sbd', passwd='')
print db_kunci
cursor_kunci = db_kunci.cursor()
tempPid = 0

class myThread (threading.Thread):
    def __init__(self, threadID, name):
        super(myThread, self).__init__()
        self.i=0
        self._stop = threading.Event()
        self.threadID = threadID
        self.name = name
    def run(self):
        self.i=0
        #print "Starting " + self.name
        while(True):
            #print self.i 
            self.i=self.i+1
            time.sleep(1) 
            if self.i==5:
                #os.kill(int(tempPid),signal.CTRL_C_EVENT)
                print "Killed PID = "+str(tempPid)
                self.i=0
                break
        #print "Exiting " + self.name
        self._stop.set()

    def terminate(self):
        print "terminate"
        self.i=0
        self._stop.set()
        temp = self._stop.isSet()
        print temp

    def stopped(self):
        return self._stop.isSet()

class execThread (threading.Thread):
    def __init__(self, threadID, name, ans):
        super(execThread, self).__init__()
        try:
            cursor_kunci.execute(ans)
        except:
            pass

# try:

while True:
    db= MySQLdb.connect('localhost', 'root', '', 'sbd')
    cursor = db.cursor()
    tmr = myThread(1, "Timer-1")
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
            tmr.start()
            try:
                eT = execThread(2, "Exec-1", ans)
                eT.start()
                print("PID is " + str(eT.ident))
                tempPid = eT.ident
                tmr.terminate()
            except:
                tmr.terminate()
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
        tmr.terminate()
        #print str(sub_id)+' Failed : '+ str(e) + ' '  + str(temp_kunci)
        print 'except '+str(sub_id)
        db.rollback()
        update1 = '''update submission set nilai = 0, status = 1 where id = '''+str(sub_id)
        cursor.execute(update1)
        db.commit()
        
    time.sleep(1)
    db.close()
db_kunci.close()
# except KeyboardInterrupt:
#     sys.exit(0)
# #except Exception, e:
# except :
#     #print str(sub_id)+' Outer Failed : '+ str(e) 
#     print 'berhenti'