@extends ('admin.masterAdmin')
@section ('content')
<title>Algorithm and Programming</title>
<div class="container">
  <div class="ui info icon huge message">
    <i class="warning circle icon"></i>
    <div class="content">
      <div class="header">
        CATATAN UNTUK ASISTEN
      </div>
      <ul class="list">
        <li>Jangan lupa cetak PDM dari database untuk panduan praktikan.</li>
        <li>Hasil query tiap soal TIDAK BOLEH MELEBIHI 10.000 row.</li>
        <li>Nyalakan dulu grader database sebelum memulai praktikum.</li>
        <li>Ingatkan praktikan mengenai hal-hal berikut AGAR SERVER TIDAK DOWN :
          <ul class="list">
            <b><p>1. CEK dulu hasil query sebelum disubmit agar tidak melebihi 10.000 row.</p></b>
            <b><p>2. Jika nilai belum keluar, berarti masih dalam proses pengecekan, JANGAN SUBMIT TERUS MENERUS. </p></b>
            <b><p>3. Setiap orang hanya boleh MEMBUKA 1 TAB browser, karena kemampuan server terbatas</p></b>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="ui center aligned text container" style="margin-bottom:0%">
  <div>
  	<center>
  		<img src="{{URL::to('assets/image/icon_baru.png')}}" style="width:100%; margin-top:0%">
  	</center>
  	<h1 class="ui dividing header">
  	<div class="content">
  	</div>
  </h1>
  </div>
</div>

@endsection