@extends ('user.masterUser')
@section ('content')


<title>Algorithm and Programming</title>
<div class="ui center aligned text container" style="margin-bottom:0%">
  <div>
  	<center>
      <?php 
      if(is_null(Auth::user()->email))
      {
        ?>
      <div class="ui negative icon message">
        <i class="mail icon"></i>
        <div class="content">
          <div class="header">
            Email Anda masih kosong
          </div>
          <p>Silahkan masukkan email aktif Anda untuk keamanan</p>
        </div>
      </div>
        <?php
      }
      ?>
      <?php 
      if(Hash::check(Auth::user()->username, Auth::user()->password))
      {
        ?>
      <div class="ui negative icon message">
        <i class="lock icon"></i>
        <div class="content">
          <div class="header">
            Password Anda belum diganti
          </div>
          <p>Silahkan ganti password Anda untuk keamanan</p>
        </div>
      </div>
        <?php
      }
      ?>
  		<img src="{{URL::to('assets/image/horizontal.png')}}" style="width:100%; margin-top:5%">
  	</center>
  	<h1 class="ui dividing header">
  	<div class="content">
  		<h3>Selamat Datang di Website</h3>
    	Sistem Basis Data Online Judge
  	</div>
  </h1>
  </div>
</div>


@endsection