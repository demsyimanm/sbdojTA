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
        <form class="ui form" action="" method="post"  ng-app="testApp" ng-strict-di>
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Versi Database</label>
                  </div>
                  <div class="thirteen wide field">
                    <select type="text" name="dbversion" placeholder="Versi Database">
                      @foreach($versions as $version)
                        @if($version->id == $db->dbversion_id)
                          <option value="{{$version->id}}" selected="">{{$version->nama}}</option>
                        @else
                          <option value="{{$version->id}}">{{$version->nama}}</option>
                        @endif
                      @endforeach
                    </select> 
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Nama Database</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="db_name" placeholder="Nama Database" value="{{$db->db_name}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Database IP</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="ip" placeholder="Database IP" value="{{$db->ip}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Connection Username</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="conn_username" placeholder="Connection Username" value="{{$db->db_username}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Connection Password</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="conn_password" placeholder="Connection Password" value="{{$db->db_password}}">
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