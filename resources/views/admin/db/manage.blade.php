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
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="15%" style="text-align:center">DB Name</th>
		        <th width="10%" style="text-align:center">Versi</th>
		        <th width="12.5%" style="text-align:center">IP</th>
	        	<th width="12.5%" style="text-align:center">Connection Userame</th>
	        	<th width="12.5%" style="text-align:center">Connection Password</th>
	        	<th width="12.5%" style="text-align:center">Grader</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($dbs as $db)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{ $db->db_name }}</td>
		      		<td>{{ $db->dbversion->nama }}</td>
		      		<td class="text-center">{{ $db->ip }}</td>
		      		<td>{{ $db->db_username }}</td>
	      			<td>{{ $db->db_password }}</td>
			      	<td>
			      		<center>
			      			@if($db->status == '0')
			      				<a href="{{URL::to('event/parser/start/'.$db->id)}}" class="btn btn-success btn-sm">Start</a>
			      				<a href="#" class="btn btn-danger btn-sm" disabled="">Stop</a>
			      			@else
			      				<a href="#" class="btn btn-success btn-sm" disabled="">Start</a>
			      				<a href="{{URL::to('event/parser/stop/'.$db->id)}}" class="btn btn-danger btn-sm" >Stop</a>
			      			@endif
			      		</center>
		      		</td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('databases/edit/'. $db->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('databases/remove/'. $db->id) }}')">
					        	<i class="trash icon"></i>
					        	Hapus
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
@endsection