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
      Tambah Versi Database
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
                    <input type="text" name="nama" placeholder="Nama Versi Database">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Import Syntax</label>
                  </div>
                  <div class="seven wide field">
                    <input type="text" name="import" placeholder="Import Syntax">
                  </div>
                  <div class="six wide field">
                    <p> Ex : MySQLdb , cx_Oracle</p>
                  </div>
                </div>
              </div>
              <div id="param">
                <div class="sixteen wide field">
                  <div class="inline fields">
                    <div class="three wide field">
                      <label>Parameter 1</label>
                    </div>
                    <div class="seven wide field">
                      <input type="text" name="param1" placeholder="Parameter 1">
                    </div>
                    <div class="six wide field">
                      <p>Ex : username , host , password<br>
                      (Bergantung kebutuhan koneksi python ke DB)<br>
                      Kosongi jika tidak diperlukan</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                  </div>
                  <div class="seven wide field">
                    <a class="ui icon teal tiny button" onclick="addParam()">
                      <i class="plus icon"></i>
                      Tambah Parameter
                    </a>
                  </div>
                </div>
              </div>
              <input type="hidden" name="sum" value="1" id="sum">
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

<script type="text/javascript">
  function addParam(){
    var sum = parseInt($('#sum').val())+1;
    $('#sum').val(sum) ;
    $('#param').append('<div class="sixteen wide field">'+
                  '<div class="inline fields">'+
                    '<div class="three wide field">'+
                      '<label>Parameter '+sum+'</label>'+
                    '</div>'+
                    '<div class="seven wide field">'+
                      '<input type="text" name="param'+sum+'" placeholder="Parameter '+sum+'">'+
                    '</div>'+
                  '</div>'+
                '</div>');
  }
</script>
@endsection