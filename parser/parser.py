#!/usr/bin/python
import MySQLdb
import cx_Oracle
import time
import sys
try:
    db_kunci = cx_Oracle.connect(user='sbdoj', password='wdvrdx24680', dsn='localhost:1521/xe')
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
                ans = ans.replace(";", "")
                try:
                    cursor_kunci.execute(ans)
                except:
                    #print str("failed to execute")
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
                        temp_kunci = temp_kunci.replace(";", "")
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
    print 'berhenti'