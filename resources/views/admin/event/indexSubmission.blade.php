@extends ('admin.masterAdmin')
@section ('content')
<h1 class="ui center aligned icon dividing header">
    <i class="list Layout icon"></i>
    <div class="content">
      Lihat Submission Praktikum & Tutorial 
    </div>
</h1>
<br>
<div class="container ui grid stackable" style="margin-bottom:10%">
  <div  class="eight wide column centered">
    <div class="ui blue segment" style="padding-bottom:5%">
      <form class="ui form" action="{{url('submissions')}}" method="post">
        <div class="ui form" style="padding-bottom:3%">
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
        </div>
      </form>
    </div>
    <br>
  </div>
  <div  class="eight wide column centered">
    <div class="ui blue segment" style="padding-bottom:5%">
      <form class="ui form" action="{{url('tutorial/submissions')}}" method="post">
        <div class="ui form" style="padding-bottom:3%">
          <div id="form2" >
            <div class="sixteen wide field text-centered" style="text-align:center">
              <label>Pilih Tutorial</label>
              <select  name="event" placeholder="Kata Kunci Pencarian" >
                @foreach( $tutorial as $tutor)
                  <option value="{{ $tutor->id }}" >{{ $tutor->judul }} Kelas {{ $tutor->kelas }}</option>
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
        </div>
      </form>
    </div>
    <br>
  </div>
</div>
@endsection