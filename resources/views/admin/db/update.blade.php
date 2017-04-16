@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            ip: {
              identifier  : 'ip',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'IP database kosong'
                },
              ]
            },
            conn_username: {
              identifier  : 'conn_username',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Database Connection Username kosong'
                },
              ]
            },
            dbversion: {
              identifier  : 'dbversion',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Versi Database kosong'
                },
              ]
            },
            /*conn_password: {
              identifier  : 'conn_password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Database Connecttion Password kosong'
                },
              ]
            },*/
            db_name: {
              identifier  : 'db_name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Nama database kosong'
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
    <i class="trophy icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Update Database
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
                    <label>Versi Database</label>
                  </div>
                  <div class="thirteen wide field">
                        <input value="{{$db->dbversion->nama}}" name="dbversion_name" readonly="">
                        <input type="hidden" value="{{$db->dbversion->id}}" name="dbversion" readonly="">
                  </div>
                </div>
              </div>
              @foreach($db->listdbparameter as $parameter)
                <div class="sixteen wide field">
                  <div class="inline fields">
                    <div class="three wide field">
                      <label>{{$parameter->dbversionparameter->parameter}}</label>
                    </div>
                    <div class="thirteen wide field">
                      <input type="text" name="{{$parameter->dbversionparameter->id}}" placeholder="{{$parameter->dbversionparameter->parameter}}" value="{{$parameter->content}}">
                    </div>
                  </div>
                </div>
              @endforeach
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>PDM</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="file" name="pdm" placeholder="PDM">
                  </div>
                </div>
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Current PDM</label>
                  </div>
                  <div class="thirteen wide field">
                    <img src="{{url('public/pdm_db/')}}/{{$db->pdm}}" style="width:60%">
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
</section>
@endsection