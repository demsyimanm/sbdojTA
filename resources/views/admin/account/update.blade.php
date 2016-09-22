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
      Update User
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
                    <input type="text" name="username" placeholder="NRP" value="{{ $user->username }}"> 
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Name</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Kelas</label>
                  </div>
                  <div class="four wide field">
                    @if($user->role_id == 1)
                      <select class="" name="kelas">
                        <option <?php if ($user->kelas == 'A') echo "selected";?>  value="A" selected="">A</option>
                        <option <?php if ($user->kelas == 'B') echo "selected";?>  value="B">B</option>
                        <option <?php if ($user->kelas == 'C') echo "selected";?>  value="C">C</option>
                        <option <?php if ($user->kelas == 'D') echo "selected";?>  value="D">D</option>
                        <option <?php if ($user->kelas == 'E') echo "selected";?>  value="E">E</option>
                      </select>
                    @elseif ($user->role_id == 2 )
                      <input type="text" class="" value="{{$user->kelas}}" readonly="" name="kelas">
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
                            <option <?php if ($user->role_id == $item->id) echo "selected";?>  value="{{ $item->id }}">{{ $item->nama}}</option>
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