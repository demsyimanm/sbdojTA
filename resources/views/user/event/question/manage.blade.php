@extends ('user.masterUser')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="trophy icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Events
	  	</div>
	  </h1>
	</div>
	<style type="text/css" media="screen">
	    .editor { 
	        position: absolute;
	        top: 0;
	        right: 0;
	        bottom: 0;
	        left: 0;
	    }
	</style>
	
	  
	<?php 
		$i=0; 
		$flag = 0;
	?>
	@foreach ($judul as $jud)
		<?php
			$temp_jud[$i] = $jud->judul;
			$temp_jud_id[$i] = $jud->id;
			$i++;
		?>
	@endforeach
	<script type="text/javascript">
	  function showFormInfo() {
	  	@for ($sum_inner=0;$sum_inner<$i;$sum_inner++)
	   		document.getElementById({{$sum_inner}}).className = "step";
	   		$("#form{{$sum_inner}}").parent().hide();
		@endfor
	  	document.getElementById("infoHead").className = "active step";
	   	$("#info").parent().show();
	  };
	</script>
	@for ($sum=0;$sum < $i;$sum++)
		<script type="text/javascript">
		  function showForm{{$sum}}() {
		  	<?php $tempFlag = 0;?>
		  	@for ($sum_inner=0;$sum_inner<$i;$sum_inner++)
			  	@if($sum == $flag and $tempFlag == 0)
			   		document.getElementById({{$sum}}).className = "active step";
			   		$("#form{{$sum}}").parent().show();
			   		<?php $tempFlag = 1;?>
			  	@elseif ($sum != $sum_inner)
			   		document.getElementById({{$sum_inner}}).className = "step";
			   		$("#form{{$sum_inner}}").parent().hide();
			   	@endif
			@endfor
		   	@if ($sum != 0)
		   		document.getElementById("0").className = "step";
		   		$("#form0").parent().hide();
		  	@endif
		  	document.getElementById("infoHead").className = "step";
		   	$("#info").parent().hide();
		  };
		</script>
		<?php $flag++;?>
	@endfor
	
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<div class="ui grid">
			<div class="four wide column">
			  	<div class="ui fluid vertical steps">
		          <a class="active step sixteen wide column" id="infoHead" onclick="showFormInfo()">
		            <i class="user icon"></i>
		            <div class="content">
		              <div class="title">Information</div>
		            </div>
		          </a>
		          <?php for ($z=0;$z<$i;$z++){?>
			          <a class="step sixteen wide column" id="{{$z}}" onclick="showForm{{$z}}()">
			            <i class="student icon"></i>
			            <div class="content">
			              <div class="title">{{$temp_jud[$z]}}</div>
			            </div>
			          </a>
		          <?php } ?>
		        </div>
			</div>
	        <div class="ui attached segment twelve wide column">
	        	<div visible>
		        	<div class="active tab-pane" id="info">
			          	<div class="">
			          		<div class="box-body ">
			          			<div class="col-md-10 col-md-offset-1">
			          			<h1>
								   {{$eve->judul}}
								</h1><br>
			          				<p style="font-size:20px;"><?php echo nl2br($eve->konten) ?></p>
			          				<br><br>
			          			</div>

			          		</div>
			          	</div>
			          </div>
	        	</div>
	        	<?php $a=0;?>
	        	@foreach ($question as $quest)
	        		<div hidden>
				        <div class="ui form" id="form{{$a}}">
				            <div class="box-body">
				          		<div class="col-md-10 col-md-offset-1">
				          			<h1>{{$quest->judul}}</h1><br>
				          			<p style="font-size:20px;"><?php echo nl2br($quest->konten)?></p>
				          			<form action="{{ URL::to('question/'. $eve->id.'/submit/'.$quest->id) }}"  method="POST">
							        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							        	<br><br>
						          		<h5>Salin query Anda ke textarea di bawah :</h5>
						          		<div class="form-group">
						          			<div class="sixteen wide field">
							                    <div class="ui default segment" style="width:100%;height:300px">
							                        <div id="editor{{$a}}" class="editor"></div>
							                     </div>
							                    <textarea name="jawaban{{$a}}" id="jawab{{$a}}"></textarea>  
							                </div>
							          	</div>
							          	<br>
							          	<div class="form-group">
							            	<div class="col-md-2 col-md-offset-10">
							              		<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
							            	</div><!-- /.col -->
							          	</div>
							          	<br>
							          	<div  class="ui orange inverted segment" id="error{{$a}}"><ul >
							          	</ul></div>
							          	<input type="hidden" name="jumlah" value="{{$i}}">
							        </form>
				          		</div>
				          	</div>
				         </div>
	        		</div>
			         <?php $a++;?>
		         @endforeach
	        </div>
		</div>
	  </div>
  </div>
</div>
<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>
<script src="{{URL::to('assets/plugin/ace/src/ace.js')}}"></script>
<script src="{{URL::to('assets/plugin/ace/src/ext-language_tools.js')}}"></script>
	<script>
		    $(document).ready(function() {
		    	var keywords = ["select","insert","update","delete","from","where","and","or","group","by","order","limit","offset","having","as","case","when","else","end","type","left","right","join","on","outer","desc","asc","union","create","table","primary","key","if","foreign","not","references","default","null","inner","cross","natural","database","drop","grant"];
				@for ($sum=0;$sum < $i;$sum++)
			      editor{{$sum}} = ace.edit('editor{{$sum}}');
			      var textarea{{$sum}} = $('textarea[name="jawaban{{$sum}}"]').hide();
			      editor{{$sum}}.setTheme('ace/theme/chrome');
			      editor{{$sum}}.getSession().setMode('ace/mode/mysql');
			      editor{{$sum}}.getSession().setValue(textarea{{$sum}}.val());
			      editor{{$sum}}.getSession().on('change', function(){
			        textarea{{$sum}}.val(editor{{$sum}}.getSession().getValue());
			      });
			      editor{{$i}} = ace.edit("editor{{$sum}}")
				  editor{{$i}}.setOptions({
				    mode: "ace/mode/sql",
				    enableBasicAutocompletion: true,
				    enableLiveAutocompletion: true
				  });
				  editor{{$i}}.completers.push({
				    getCompletions: function(editor, session, pos, prefix, callback) {
				      callback(null, [
				        
				      ]);
				    }
				  });
				  editor = ace.edit("editor{{$sum}}")
					editor.getSession().on('change', function(){
				        
				        var array{{$sum}} = [];
					    str = document.getElementById('jawab{{$sum}}').value;
					    splitedString = str.split(" ");
					    for (var z = 0; z < splitedString.length; z++) {
					    	if( keywords.indexOf(splitedString[z]) >= 0)
					    	{
					    		array{{$sum}}.push(splitedString[z]);
					    	}
					    }
					   	document.getElementById('error{{$sum}}').innerHTML= "";
					   	var targt= document.getElementById('error{{$sum}}');
					   	for (var y = 0; y < array{{$sum}}.length; y++) {
					   		$("#error{{$sum}}").append('<li>Syntax <b>"'+array{{$sum}}[y]+'"</b> usahakan menggunakan <b>upppercase</b></li>');
					   	}

					});
				@endfor
		  });
	</script>
	<script>
		
	</script>


@endsection