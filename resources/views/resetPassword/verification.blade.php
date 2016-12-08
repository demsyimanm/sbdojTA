
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Reset Password</title>
  @include('header')
  @include('footer')

  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your username'
                },
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
              ]
            },
            password2: {
              identifier  : 'password2',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password verification'
                },
                {
                  type   : 'match[password]',
                  prompt : 'Password not match'
                },
              ]
            },
            kode: {
              identifier  : 'kode',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your verification code'
                },
              ]
            },
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="{{URL::to('assets/image/horizontal.png')}}" style="width:80%" class="image">
      <div class="content" style="color:#b4312f ">
        Reset Password
      </div>
    </h2>
    <form class="ui large form" action="{{url('reset/password/verification')}}" method="POST">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="NRP">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="check icon"></i>
            <input type="text" name="kode" placeholder="Kode Verifikasi">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password2" placeholder="Konfirmasi Password">
          </div>
        </div>
        {{csrf_field()}}
        <div class="ui fluid large teal submit button" style="background-color:#b4312f ">Ubah</div>
      </div>
      <div class="ui error message"></div>
    </form>
  </div>
</div>
</body>
</html>
