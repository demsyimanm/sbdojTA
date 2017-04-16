@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            nama: {
              identifier  : 'nama',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Nama kosong'
                },
              ]
            },
            import: {
              identifier  : 'import',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Import Kosong'
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
      Update Versi Database
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post"  ng-app="testApp" ng-strict-di enctype="multipart/form-data">
          <div visible>
            <div id="form1" >
              @if($errors->any())
                  <div class="ui red inverted segment">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
              @endif
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Nama</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="nama" placeholder="Nama Versi Database" value="{{$version->nama}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Import Syntax</label>
                  </div>
                  <div class="seven wide field">
                    <input type="text" name="import" placeholder="Import Syntax" value="{{$version->import}}">
                  </div>
                  <div class="six wide field">
                    <p> Ex : MySQLdb , cx_Oracle</p>
                  </div>
                </div>
              </div>
              @php $i = 1; @endphp
              @foreach($version->dbversionparameter as $parameter)
                <div id="param">
                  <div class="sixteen wide field">
                    <div class="inline fields">
                      <div class="three wide field">
                        <label>Parameter {{$i}}</label>
                      </div>
                      <div class="seven wide field">
                        <input type="text" name="{{$parameter->id}}" placeholder="Parameter 1" value="{{$parameter->parameter}}">
                      </div>
                      @if($i == 1)
                        <div class="six wide field">
                          <p>Ex : username , host , password<br>
                          (Bergantung kebutuhan koneksi python ke DB)<br>
                          Kosongi jika tidak diperlukan</p>
                        </div>
                        @endif
                    </div>
                  </div>
                </div>
                @php $i++; @endphp
              @endforeach
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
</section>
@endsection