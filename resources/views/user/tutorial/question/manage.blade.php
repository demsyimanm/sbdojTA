@extends ('user.masterUser')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="book icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Tutorial
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
			<div class="three wide column">
			  	<div class="ui fluid vertical steps">
		          <a class="active step sixteen wide column" id="infoHead" onclick="showFormInfo()">
		            <i class="user icon"></i>
		            <div class="content">
		              <div class="title">Information</div>
		            </div>
		          </a>
		          <?php for ($z=0;$z<$i;$z++){?>
			          <a class="step sixteen wide column" id="{{$z}}" onclick="showForm{{$z}}()">
			            <i class="book icon"></i>
			            <div class="content">
			              <div class="title">{{$temp_jud[$z]}}</div>
			            </div>
			          </a>
		          <?php } ?>
		        </div>
			</div>
	        <div class="ui attached segment thirteen wide column">
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
				          		<div class="col-md-12 ">
				          			<h1>{{$quest->judul}}</h1><br>
				          			<p style="font-size:20px;"><?php echo nl2br($quest->konten)?></p>
				          			<form action="{{ URL::to('tutorial/'. $eve->id.'/submit/'.$quest->id) }}"  method="POST">
							        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							        	<br><br>
						          		<h5>Salin query Anda ke textarea di bawah :</h5>
						          		<div class="form-group col-md-7">
						          			<div class="sixteen wide field">
							                    <div class="ui default segment" style="width:100%;height:300px">
							                        <div id="editor{{$a}}" class="editor"></div>
							                     </div>
							                    <textarea name="jawaban{{$a}}" id="jawab{{$a}}"></textarea>  
							                </div>
							          	</div>
							          	<div class="form-group col-md-5">
							          		<div class="sixteen wide field">
						          				<div  class="" id="error{{$a}}"></div>
						          				<div  class="" id="warning{{$a}}"><ul></ul></div>
						          			</div>
							          	</div>
							          	<br>
							          	<div class="col-md-12" style="margin-bottom: 3%">
							          		
							          	</div>
							          	<div class="form-group col-md-12">
							            	<div class="col-md-2 col-md-offset-10">
							              		<button type="submit" id="submit{{$a}}" class="btn btn-primary btn-block btn-flat">Submit</button>
							            	</div><!-- /.col -->
							          	</div>
							          	<br>
							          	
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
<script src="{{URL::to('assets/parser/lib/browser.js')}}"  charset="utf-8" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  
</script>
	<script>
		    $(document).ready(function() {
		    	var keywords = ["alter","and","as","asc","between","count","create","delete","desc","distinct","drop","from","having","in","insert","into","is","join","like","not","on","or","order","select","set","table","union","update","values","where","accessible","action","add","after","algorithm","all","analyze","asensitive","at","authors","auto_increment","autocommit","avg","avg_row_length","before","binary","binlog","both","btree","cache","call","cascade","cascaded","case","catalog_name","chain","change","changed","character","check","checkpoint","checksum","class_origin","client_statistics","close","coalesce","code","collate","collation","collations","column","columns","comment","commit","committed","completion","concurrent","condition","connection","consistent","constraint","contains","continue","contributors","convert","cross","current_date","current_time","current_timestamp","current_user","cursor","data","database","databases","day_hour","day_microsecond","day_minute","day_second","deallocate","dec","declare","default","delay_key_write","delayed","delimiter","des_key_file","describe","deterministic","dev_pop","dev_samp","deviance","directory","disable","discard","distinctrow","div","dual","dumpfile","each","elseif","enable","enclosed","end","ends","engine","engines","enum","errors","escape","escaped","even","event","events","every","execute","exists","exit","explain","extended","fast","fetch","field","fields","first","flush","for","force","foreign","found_rows","full","fulltext","function","general","global","grant","grants","group","groupby_concat","handler","hash","help","high_priority","hosts","hour_microsecond","hour_minute","hour_second","if","ignore","ignore_server_ids","import","index","index_statistics","infile","inner","innodb","inout","insensitive","insert_method","install","interval","invoker","isolation","iterate","key","keys","kill","language","last","leading","leave","left","level","limit","linear","lines","list","load","local","localtime","localtimestamp","lock","logs","low_priority","master","master_heartbeat_period","master_ssl_verify_server_cert","masters","match","max","max_rows","maxvalue","message_text","middleint","migrate","min","min_rows","minute_microsecond","minute_second","mod","mode","modifies","modify","mutex","mysql_errno","natural","next","no","no_write_to_binlog","offline","offset","one","online","open","optimize","option","optionally","out","outer","outfile","pack_keys","parser","partition","partitions","password","phase","plugin","plugins","prepare","preserve","prev","primary","privileges","procedure","processlist","profile","profiles","purge","query","quick","range","read","read_write","reads","real","rebuild","recover","references","regexp","relaylog","release","remove","rename","reorganize","repair","repeatable","replace","require","resignal","restrict","resume","return","returns","revoke","right","rlike","rollback","rollup","row","row_format","rtree","savepoint","schedule","schema","schema_name","schemas","second_microsecond","security","sensitive","separator","serializable","server","session","share","show","signal","slave","slow","smallint","snapshot","soname","spatial","specific","sql","sql_big_result","sql_buffer_result","sql_cache","sql_calc_found_rows","sql_no_cache","sql_small_result","sqlexception","sqlstate","sqlwarning","ssl","start","starting","starts","status","std","stddev","stddev_pop","stddev_samp","storage","straight_join","subclass_origin","sum","suspend","table_name","table_statistics","tables","tablespace","temporary","terminated","to","trailing","transaction","trigger","triggers","truncate","uncommitted","undo","uninstall","unique","unlock","upgrade","usage","use","use_frm","user","user_resources","user_statistics","using","utc_date","utc_time","utc_timestamp","value","variables","varying","view","views","warnings","when","while","with","work","write","xa","xor","year_month","zerofill","begin","do","then","else","loop","repeat","by","bool","boolean","bit","blob","decimal","double","enum","float","long","longblob","longtext","medium","mediumblob","mediumint","mediumtext","time","timestamp","tinyblob","tinyint","tinytext","text","bigint","int","int1","int2","int3","int4","int8","integer","float","float4","float8","double","char","varbinary","varchar","varcharacter","precision","date","datetime","year","unsigned","signed","numeric","ucase","lcase","mid","len","round","rank","now","format","coalesce","ifnull","isnull","nvl","charset","clear","connect","edit","ego","exit","go","help","nopager","notee","nowarning","pager","print","prompt","quit","rehash","source","status","system","tee","false","true","null","unknown","date","time","timestamp","ODBCdotTable","zerolessFloat"];
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
				    mode: "ace/mode/mysql",
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
					   	document.getElementById('warning{{$sum}}').innerHTML= "";
					   	if (array{{$sum}}.length > 0) {
					   		document.getElementById('warning{{$sum}}').className = 'ui orange inverted segment';
					   		document.getElementById('warning{{$sum}}').innerHTML = '<i class="warning sign icon"></i><b>WARNING</b><br>'
					   	}
					   	else{
					   		document.getElementById('warning{{$sum}}').className = '';	
					   		document.getElementById('warning{{$sum}}').innerHTML = ""
					   	}
					   	for (var y = 0; y < array{{$sum}}.length; y++) {
					   		$("#warning{{$sum}}").append('<li>Syntax <b>"'+array{{$sum}}[y]+'"</b> usahakan menggunakan <b>upppercase</b></li>');
					   	}

					   	var ret = 0;
					   	try {
						    ret = SQLParser.parse(str);
						    document.getElementById('error{{$sum}}').innerHTML= "";
						    var html = ret.toString();
						    var str = html.replace(/\t/g, '&nbsp;&nbsp;&nbsp;&nbsp;')
							           .replace(/  /g, '&nbsp; ')
							           .replace(/  /g, ' &nbsp;')
							           .replace(/\r\n|\n|\r/g, '<br />');
						    //str = str.replace(/(?:\r\n|\r|\n)/g, '<br />');
  							document.getElementById('error{{$sum}}').innerHTML = '<i class="large check circle outline icon"></i><b>CORRECT</b><br><br>'+(str);
  							document.getElementById('error{{$sum}}').className = 'ui green inverted segment';
  							document.getElementById('submit{{$sum}}').disabled = false;
  							//console.log(html);
						}
						catch(err) {
							document.getElementById('error{{$sum}}').innerHTML= "";
							document.getElementById('error{{$sum}}').innerHTML= '<i class="large remove circle outline icon"></i><b>ERROR</b><br><br>'+err;
							document.getElementById('error{{$sum}}').className = 'ui red inverted segment';
							document.getElementById('submit{{$sum}}').disabled = true;
						    //console.log(err);
						}
					   	
  						

					});
				@endfor
		  });
	</script>
	<!-- <script src="{{URL::to('assets/parser/lib/compiled_parser.js')}}"  charset="utf-8" type="text/javascript"></script>
	<script src="{{URL::to('assets/parser/lib/grammar.js')}}"  charset="utf-8" type="text/javascript"></script>
	<script src="{{URL::to('assets/parser/lib/lexer.js')}}"  charset="utf-8" type="text/javascript"></script>
	<script src="{{URL::to('assets/parser/lib/nodes.js')}}"  charset="utf-8" type="text/javascript"></script>
	<script src="{{URL::to('assets/parser/lib/parser.js')}}"  charset="utf-8" type="text/javascript"></script>
	<script src="{{URL::to('assets/parser/lib/sql_parser.js')}}"  charset="utf-8" type="text/javascript"></script> -->
@endsection