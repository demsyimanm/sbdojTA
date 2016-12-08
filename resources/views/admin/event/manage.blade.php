@extends ('admin.masterAdmin')
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
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{url('events/add')}}">
		<i class="plus icon"></i>
		Tambah Event
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="20%" style="text-align:center">Judul<span style="font-size:11px;"> &nbsp;(click the title to edit questions)</span></th>
		        <th width="12.5%" style="text-align:center">Waktu Mulai</th>
	        	<th width="12.5%" style="text-align:center">Waktu Akhir</th>
	        	<th width="5%" style="text-align:center">Kelas</th>
	        	<th width="12.5%" style="text-align:center">DB Name</th>
	        	<th width="12.5%" style="text-align:center">DB IP</th>
	        	<th width="5%" style="text-align:center">Grader Status</th>
	        	<th width="15%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($event as $eve)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td><a href="{{ URL::to('questions/'. $eve->id) }}" >{{ $eve->judul }}</a></td>
		      		<?php
		                $timestamp1 = $eve->waktu_mulai;
		                $datetime1 = explode(" ", $timestamp1);
		                $date1 = $datetime1[0];
		                $time1 = $datetime1[1];
		                $date1 = DateTime::createFromFormat('Y-m-d', $date1)->format('d M Y');
		                $time1 = DateTime::createFromFormat('H:i:s', $time1)->format('H:i');

		                $timestamp2 = $eve->waktu_akhir;
		                $datetime2 = explode(" ", $timestamp2);
		                $date2 = $datetime2[0];
		                $time2 = $datetime2[1];
		                $date2 = DateTime::createFromFormat('Y-m-d', $date2)->format('d M Y');
		                $time2 = DateTime::createFromFormat('H:i:s', $time2)->format('H:i');
		              ?>
		      		<td><b>{{ $date1 }}</b> on <b>{{$time1}}</b></td>
	      			<td><b>{{ $date2 }}</b> on <b>{{$time2}}</b></td>
		      		<td style="text-align:center">{{ $eve->kelas }}</td>
		      		<td >{{ $eve->listdb->db_name }}</td>
		      		<td >{{ $eve->listdb->ip }}</td>
			      	<td>
			      		<center>
			      			@if($eve->listdb->status == '0')
			      				<div class="ui big red label">Off</div>
			      			@else
			      				<div class="ui big green label">On</div>
			      			@endif
			      		</center>
		      		</td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('events/edit/'. $eve->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('events/remove/'. $eve->id) }}')">
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
  	Hapus Data Event
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Event ini?</p></center>
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