@extends ('admin.masterAdmin')
@section ('content')
<h1 class="ui center aligned icon dividing header">
    <i class="bar chart Layout icon"></i>
    <div class="content">
      Lihat Scoreboard (Asisten)
    </div>
</h1>
<br>
<div class="container ui grid stackable" style="margin-bottom:10%">
  <div  class="twelve wide column centered">
    <div class="ui blue segment" style="padding-bottom:5%">
      <form class="ui form" action="" method="post">
        <div class="ui form" style="padding-bottom:3%">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field text-centered" style="text-align:center">
                <label>Pilih Event</label>
                <select  name="event" placeholder="Kata Kunci Pencarian" >
                  	@foreach( $event as $eve)
                		<option value="{{ $eve->id }}" >{{ $eve->judul }} Kelas {{ $eve->kelas }}</option>
                	@endforeach
                </select>
              </div>
              <br>
              <div style="">
                <button class="ui icon blue fluid button centered" type="submit">
                  Lihat
                  <i class="check circle icon"></i>
                </button>
              </div>
            </div>
            {{csrf_field()}}
          </form>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
@endsection