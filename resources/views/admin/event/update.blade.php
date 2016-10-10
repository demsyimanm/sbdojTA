@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            judul: {
              identifier  : 'judul',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Judul event kosong'
                }
              ]
            },
            konten: {
              identifier  : 'konten',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Catatan Kosong'
                },
              ]
            },
            kelas: {
              identifier  : 'kelas',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Kelas Kosong'
                },
              ]
            },
            ip: {
              identifier  : 'ip',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'IP database kosong'
                },
              ]
            },
            conn_username: {
              identifier  : 'conn_username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Database Connection Username kosong'
                },
              ]
            },
            conn_password: {
              identifier  : 'conn_password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Database Connecttion Password kosong'
                },
              ]
            },
            db_name: {
              identifier  : 'db_name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Nama database kosong'
                },
              ]
            }
          }
        })
      ;
    })
  ;
  </script>

  <script src="{{URL::to('assets/js/moment.min.js')}}"></script>
  <script src="{{URL::to('assets/js/angular.min.js')}}"></script>
  <script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
  <script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script>
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="trophy icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah Event
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post"  ng-app="testApp">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Judul Event</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="judul" placeholder="Judul Event" value="{{$even->judul}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Catatan</label>
                  </div>
                  <div class="thirteen wide field">
                    <textarea type="text" name="konten" placeholder="Pesan untuk Praktikan" style="resize:vertical;">{{$even->konten}}</textarea>
                  </div>
                </div>
              </div>
              <?php
                $timestamp1 = $even->waktu_mulai;
                $datetime1 = explode(" ", $timestamp1);
                $date1 = $datetime1[0];
                $time1 = $datetime1[1];
                $date1 = DateTime::createFromFormat('Y-m-d', $date1)->format('d-m-Y');

                $timestamp2 = $even->waktu_akhir;
                $datetime2 = explode(" ", $timestamp2);
                $date2 = $datetime2[0];
                $time2 = $datetime2[1];
                $date2 = DateTime::createFromFormat('Y-m-d', $date2)->format('d-m-Y');
              ?>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field" >
                    <label>Tanggal Mulai</label>
                  </div>
                  <div class="four wide field " > 
                    <input type="text" name="tgl_mulai" readonly="" class="datepicker" placeholder="Tanggal Mulai" value="{{$date1}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field " >
                    <label>Waktu Mulai</label>
                  </div>
                  <div class="four wide field bootstrap-timepicker timepicker">
                    <input data-field="time" value="{{$time1}}" readonly name="wkt_mulai" id="timepicker1" data-provide="timepicker" data-minute-step="1" >
                    <div id="dtBox1"></div>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Waktu Akhir</label>
                  </div>
                  <div class="four wide field bootstrap-timepicker timepicker" >
                    <input  data-field="time" value="{{$time2}}" readonly name="wkt_akhir" id="timepicker2" data-provide="timepicker" data-minute-step="1" >
                    <div id="dtBox2"></div>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Tanggal Akhir</label>
                  </div>
                  <div class="four wide field" >
                    <input type="text" value="{{$date2}}" name="tgl_akhir" class="datepicker" readonly=""placeholder="Tanggal Akhir">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Kelas</label>
                  </div>
                  <div class="four wide field">
                    @if($user == 1)
                      <select class="" name="kelas">
                          <option <?php if ($even->kelas == 'A') echo "selected";?> value="A">A</option>
                          <option <?php if ($even->kelas == 'B') echo "selected";?>value="B">B</option>
                          <option <?php if ($even->kelas == 'C') echo "selected";?>value="C">C</option>
                          <option <?php if ($even->kelas == 'D') echo "selected";?>value="D">D</option>
                          <option <?php if ($even->kelas == 'E') echo "selected";?>value="E">E</option>
                      </select>
                    @elseif ($user == 2 )
                      <input type="text" class="" value="{{$even->kelas}}" readonly="" name="kelas">
                      <!-- <input type="hidden" class="" name="kelas" value="{{$kelas}}"> -->
                    @endif
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Database IP</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="ip" placeholder="Database IP" value="{{$even->ip}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Connection Username</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="conn_username" placeholder="Connection Username"  value="{{$even->db_username}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Connection Password</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="conn_password" placeholder="Connection Password" value="{{$even->db_password}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Nama Database</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="db_name" placeholder="Nama Database" value="{{$even->db_name}}">
                  </div>
                </div>
              </div>
              {{csrf_field()}}
              <div class="ui error message"></div>
              <button class="ui icon green button" type="submit">
                Simpan
                <i class="save icon"></i>
              </button>
            </div>
          </div>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>
  
<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>

<script type="text/javascript">
            $('#timepicker1').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            });
    </script>
    <script type="text/javascript">
            $('#timepicker2').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            });
    </script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
          format: 'dd-mm-yyyy',
          clearBtn: true,
           autoclose: true
      });
    </script>
</section>
@endsection