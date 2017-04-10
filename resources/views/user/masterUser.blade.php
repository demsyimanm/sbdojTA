<?php 

?>
<!DOCTYPE html>

<html lang="en">
  <link rel="icon" type="image/png" href="{{URL::to('assets/image/vertical_baru.png')}}">
  @include('header')
  @include('footer')	
  @include('user.navUser')
  <body class="hold-transition skin-blue fixed sidebar-mini">
  	<div class="wrapper">
  		
  		<div class="content-wrapper">
  			@yield('content')
  		</div>
      </div>
  </body>
</html>
