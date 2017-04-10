@extends ('user.masterUser')
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
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Email Kosong'
                },
                {
                  type   : 'email',
                  prompt : 'Email tidak valid'
                },
                
              ]
            },
            oldPassword: {
              identifier  : 'oldPassword',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Password Lama Kosong'
                },
              ]
            },
            newPassword: {
              identifier  : 'newPassword',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Password Baru Kosong'
                },
              ]
            },
            verifyPassword: {
              identifier  : 'verifyPassword',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Verifikasi Password Kosong  '
                },
                {
                  type   : 'match[newPassword]',
                  prompt : 'Password baru tidak sama'
                },
              ]
            },
           
          }
        })
      ;
    })
  ;
  </script>
  <script type="text/javascript">
    function showFormProfile() {
      document.getElementById("profile").className = "active step";
      $("#profileTab").parent().show();
      document.getElementById("password").className = "step";
      $("#passwordTab").parent().hide();
    };
  </script>
  <script type="text/javascript">
    function showFormPassword() {
      document.getElementById("profile").className = "step";
      $("#profileTab").parent().hide();
      document.getElementById("password").className = "active step";
      $("#passwordTab").parent().show();
    };
  </script>
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="users icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Update Profile
    </div>
  </h1>
  <br>
  <div style="padding:0%;padding-top:0px">
    <div class="ui blue segment" style="height:80%">
    <div class="ui grid">
      <div class="five wide column">
          <div class="ui fluid vertical steps">
            <a class="active step sixteen wide column" id="profile" onclick="showFormProfile()">
              <i class="user icon"></i>
              <div class="content">
                <div class="title">Profile</div>
              </div>
            </a>
            <a class="step sixteen wide column" id="password" onclick="showFormPassword()">
              <i class="lock icon"></i>
              <div class="content">
                <div class="title">Change Password</div>
              </div>
            </a>
          </div>
      </div>
        <div class="ui attached segment eleven wide column">
          <div visible>
            <div class="active tab-pane" id="profileTab">
              <div class="">
                <div class="box-body ">
                  <div class="col-md-10 col-md-offset-1">
                    <form class="ui form" action="{{url('profile')}}" method="post">
                      <div>
                        <div id="formProfile" >
                          <div class="sixteen wide field">
                            <div class="inline fields">
                              <div class="two wide field">
                                <label>NRP</label>
                              </div>
                              <div class="fourteen wide field">
                                <input type="text" name="username" placeholder="NRP" value="{{ $user->username }}" readonly=""> 
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
                                @elseif ($user->role_id == 2 or $user->role_id == 3)
                                  <input type="text" class="" value="{{$user->kelas}}" readonly="" name="kelas">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="sixteen wide field">
                            <div class="inline fields">
                              <div class="two wide field">
                                <label>Email</label>
                              </div>
                              <div class="fourteen wide field">
                                <input type="text" name="email" placeholder="Email" value="{{ $user->email }}">
                              </div>
                            </div>
                          </div>
                          {{csrf_field()}}
                          <div class="ui error message"></div>
                          <button class="ui icon green button" type="submit">
                            Save
                            <i class="save icon"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>   
          <div hidden>
            <div class="tab-pane" id="passwordTab">
              <div class="">
                <div class="box-body ">
                  <div class="col-md-10 col-md-offset-1">
                    <form class="ui form" action="{{url('auth/password')}}" method="post">
                      <div>
                        <div id="formPassword" >
                          <div class="sixteen wide field">
                            <div class="inline fields">
                              <div class="four wide field">
                                <label>Old Password</label>
                              </div>
                              <div class="twelve wide field">
                                <input type="password" name="oldPassword" placeholder="Old Password"> 
                              </div>
                            </div>
                          </div>
                          <div class="sixteen wide field">
                            <div class="inline fields">
                              <div class="four wide field">
                                <label>New Password</label>
                              </div>
                              <div class="twelve wide field">
                                <input type="password" name="newPassword" placeholder="New Password">
                              </div>
                            </div>
                          </div>
                          <div class="sixteen wide field">
                            <div class="inline fields">
                              <div class="four wide field">
                                <label>Verify Password</label>
                              </div>
                              <div class="twelve wide field">
                                <input type="password" name="verifyPassword" placeholder="Verify Password">
                              </div>
                            </div>
                          </div>
                          {{csrf_field()}}
                          <div class="ui error message"></div>
                          <button class="ui icon green button" type="submit">
                            Save
                            <i class="save icon"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
  
<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>

<?php
if(Session::has('status') && Session::get('status') == 'profile-success'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Profile berhasil diubah!", "success");';
      echo '</script>';
}

else if(Session::has('status') && Session::get('status') == 'password-success'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Password berhasil diganti!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'wrong-password'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", "Password lama tidak valid!", "error");';
      echo '</script>';
}

?>

<!-- <script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script> -->

@endsection