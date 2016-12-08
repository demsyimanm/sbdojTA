@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            username: {
              identifier  : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'NRP Kosong'
                },
                {
                  type   : 'length[10]',
                  prompt : 'NRP Tidak Valid'
                }
              ]
            },
            nama: {
              identifier  : 'nama',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Nama Kosong'
                },
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Password Kosong'
                },
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="users icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah User
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>NRP</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="username" placeholder="NRP">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Name</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="nama" placeholder="Nama Lengkap">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Password</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="password" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
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
                  <div class="two wide field">
                    <label>Role</label>
                  </div>
                  <div class="four wide field">
                    <select class="" name="role_id">
                        @foreach ($role as $item)
                            @if($item->id==3)
                            <option value="{{ $item->id }}" selected="">{{ $item->nama}}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->nama}}</option>
                            @endif
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

<!-- <script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script> -->

@endsection