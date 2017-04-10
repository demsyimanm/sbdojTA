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
            db: {
              identifier  : 'db',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Database Kosong'
                },
              ]
            },
          }
        })
      ;
    })
  ;
  </script>
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="trophy icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah Tutorial
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post"  ng-app="testApp" ng-strict-di>
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Judul Tutorial</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="judul" placeholder="Judul Event">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Catatan</label>
                  </div>
                  <div class="thirteen wide field">
                    <textarea type="text" name="konten" placeholder="Pesan untuk Praktikan" style="resize:vertical;"></textarea>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field" >
                    <label>Tanggal Mulai</label>
                  </div>
                  <div class="thirteen wide field " ng-controller="mainController"> 
                    <input type="text" name="tgl_mulai" readonly="" ng-flat-datepicker datepicker-config="datepickerConfig" ng-model="date" ui-date ui-date-format placeholder="Tanggal Mulai">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field " >
                    <label>Waktu Mulai</label>
                  </div>
                  <div class="four wide field bootstrap-timepicker timepicker">
                    <input data-field="time" readonly name="wkt_mulai" id="timepicker1" data-provide="timepicker" data-minute-step="1" >
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
                    <input  data-field="time" readonly name="wkt_akhir" id="timepicker2" data-provide="timepicker" data-minute-step="1" >
                    <div id="dtBox2"></div>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Tanggal Akhir</label>
                  </div>
                  <div class="thirteen wide field" ng-controller="mainController">
                    <input type="text" name="tgl_akhir" readonly="" ng-flat-datepicker datepicker-config="datepickerConfig" ng-model="date" ui-date ui-date-format placeholder="Tanggal Akhir">
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
                        <option value="A" selected="">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                      </select>
                    @elseif ($user == 2 )
                      <input type="text" class="" value="{{$kelas}}" readonly="" name="kelas">
                      <!-- <input type="hidden" class="" name="kelas" value="{{$kelas}}"> -->
                    @endif
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Database</label>
                  </div>
                  <div class="four wide field">
                    <select class="" name="db">
                      @foreach($dbs as $db)
                        <option value="{{$db->id}}" selected="">{{$db->db_name}} | {{$db->ip}}</option>
                      @endforeach
                    </select>
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

<script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script>
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
          format: 'yyyy/mm/dd',
          clearBtn: true,
           autoclose: true
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $("#dtBox1").DateTimePicker({
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function()
    {
      $("#dtBox2").DateTimePicker({
      });
    });
  </script>
</section>
@endsection