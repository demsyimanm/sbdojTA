@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="database icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Databases
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{url('databases/add')}}">
		<i class="plus icon"></i>
		Tambah Database
	  </a>
	  <a class="ui icon orange button" href="{{url('databases/version')}}">
		<i class="plus icon"></i>
		Tambah Versi Database
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="15%" style="text-align:center">Versi</th>
		        <th width="30%" style="text-align:center">Parameters</th>
	        	<th width="17.5%" style="text-align:center">Grader</th>
	        	<th width="17.5%" style="text-align:center">Grader Tutorial</th>
	        	<th width="15%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($dbs as $db)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{ $db->dbversion->nama }}</td>
		      		<td>
		      			<ul>
			      			@foreach($db->listdbparameter as $parameter)
			      				<li>{{$parameter->dbversionparameter->parameter}} : {{$parameter->content}}</li>
			      			@endforeach
		      			</ul>
		      		</td>
			      	<td>
			      		<center>
			      			@if($db->status == '0')
			      				<button class="btn btn-success btn-sm " id="start_{{$db->id}}" onclick="start('{{$db->id}}')">Start</button>
			      				<button class="btn btn-danger btn-sm" id="stop_{{$db->id}}" onclick="stop('{{$db->id}}')" disabled="">Stop</a>
			      			@else
			      				<button class="btn btn-success btn-sm " id="start_{{$db->id}}" disabled="" onclick="start('{{$db->id}}')">Start</button>
			      				<button class="btn btn-danger btn-sm" id="stop_{{$db->id}}" onclick="stop('{{$db->id}}')">Stop</a>
			      			@endif
			      		</center>
		      		</td>
		      		<td>
			      		<center>
			      			@if($db->gradertutorial_status == '0')
			      				<button class="btn btn-success btn-sm " id="start_tutorial_{{$db->id}}" onclick="startTutorial('{{$db->id}}')">Start</button>
			      				<button class="btn btn-danger btn-sm" id="stop_tutorial_{{$db->id}}" onclick="stopTutorial('{{$db->id}}')" disabled="">Stop</a>
			      			@else
			      				<button class="btn btn-success btn-sm " id="start_tutorial_{{$db->id}}" disabled="" onclick="startTutorial('{{$db->id}}')">Start</button>
			      				<button class="btn btn-danger btn-sm" id="stop_tutorial_{{$db->id}}" onclick="stopTutorial('{{$db->id}}')">Stop</a>
			      			@endif
			      		</center>
		      		</td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue tiny button" href="{{ URL::to('databases/edit/'. $db->id) }}">
					        	<i class="pencil icon"></i>
					      	</a>

					      	<button class="ui icon test red tiny button del" onclick="dele('{{URL::to('databases/remove/'. $db->id) }}')">
					        	<i class="trash icon"></i>
					      	</button>

				      	</center>
			      	</td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
  </div>
</div>

<div id="modaldiv" class="ui small basic test modal" >
  <div class="ui icon header">
  	<i class="trash icon"></i>
  	Hapus Data Database
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Database ini?</p></center>
  </div>
  <div class="actions">
  	<div class="ui red basic cancel inverted button">
    	<i class="remove icon"></i>
    	No
  	</div>
  	<a class="ui green ok inverted button button_modal">
    	<i class="checkmark icon"></i>
    	Yes
  	</a>
   </div>
</div>

<script type="text/javascript">
	function dele(id){
        $('#modaldiv').modal('show');
        $('.button_modal').attr({href:id});
	};
</script>
<script> 
  $(function () {
    $("#matkul").DataTable();
        });
</script>
<script type="text/javascript">
	function start(id){
		$.ajax({
		    type: "GET",
		    url: '{{URL::to("event/parser/start")}}'+"/"+id
		}).done(function( msg ) {
		    if (msg=="true") {
		    	document.getElementById("start_"+id).disabled = true;
		    	document.getElementById("stop_"+id).disabled = false;
		    };
		});
	}
</script>
<script type="text/javascript">
	function stop(id){
		$.ajax({
		    type: "GET",
		    url: '{{URL::to("event/parser/stop")}}'+"/"+id
		}).done(function( msg ) {
		    if (msg=="true") {
		    	document.getElementById("start_"+id).disabled = false;
		    	document.getElementById("stop_"+id).disabled = true;
		    };
		    if (msg=="false") {
		    	alert("Grader tidak ada");
		    };
		});
	}
</script>
<script type="text/javascript">
	function startTutorial(id){
		$.ajax({
		    type: "GET",
		    url: '{{URL::to("tutorial/parser/start")}}'+"/"+id
		}).done(function( msg ) {
		    if (msg=="true") {
		    	document.getElementById("start_tutorial_"+id).disabled = true;
		    	document.getElementById("stop_tutorial_"+id).disabled = false;
		    };
		});
	}
</script>
<script type="text/javascript">
	function stopTutorial(id){
		$.ajax({
		    type: "GET",
		    url: '{{URL::to("tutorial/parser/stop")}}'+"/"+id
		}).done(function( msg ) {
		    if (msg=="true") {
		    	document.getElementById("start_tutorial_"+id).disabled = false;
		    	document.getElementById("stop_tutorial_"+id).disabled = true;
		    };
		    if (msg=="false") {
		    	alert("Grader tidak ada");
		    };
		});
	}
</script>
@endsection