@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            judul: {
              identifier  : 'judul',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Judul event kosong'
                }
              ]
            },
            konten: {
              identifier  : 'konten',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Catatan Kosong'
                },
              ]
            },
            jawaban: {
              identifier  : 'jawaban',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Jawaban Kosong'
                },
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
  <style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
  
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="trophy icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah Pertanyaan event "{{$eve->judul}}"
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Judul Pertanyaan</label>
                  </div>
                  <div class="thirteen wide field">
                    <input type="text" name="judul" placeholder="Judul Pertanyaan">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Pertanyaan</label>
                  </div>
                  <div class="thirteen wide field">
                    <textarea type="text" name="konten" style="resize:vertical;"></textarea>
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="three wide field">
                    <label>Jawaban</label>
                  </div>
                  <div class="thirteen wide field">
                      <div class="ui default segment" style="width:100%;height:300px">
                        <div id="editor"></div>
                      </div>
                    <textarea name="jawaban"></textarea>
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


<script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script>
<script src="{{URL::to('assets/plugin/ace/src/ace.js')}}"></script>

  
  <script>
    $(document).ready(function() {
      editor = ace.edit('editor');
      var textarea = $('textarea[name="jawaban"]').hide();
      editor.setTheme('ace/theme/chrome');
      editor.getSession().setMode('ace/mode/mysql');
      editor.getSession().setValue(textarea.val());
      editor.getSession().on('change', function(){
        textarea.val(editor.getSession().getValue());
      });
  });
</script>

</section>
@endsection