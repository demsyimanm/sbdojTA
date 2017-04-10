@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="trophy icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Lihat Submission Tutorial "{{$event->judul}}"
	  	</div>
	  </h1>
	</div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="10%" style="text-align:center">NRP</th>
		        <th width="25%" style="text-align:center">Nama</th>
	        	<th width="15%" style="text-align:center">Judul Soal</th>
	        	<th width="35%" style="text-align:center">Jawaban</th>
	        	<th width="10%" style="text-align:center">Nilai</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($submissions as $submission)
		  		@if($submission->status == 0)
		  		<tr>
		  		@elseif($submission->status == 1 && $submission->nilai == 0)
			    <tr style="background-color:#eed3d3">
			    @elseif($submission->status == 1 && $submission->nilai == 100)
			    <tr style="background-color:#e7eed8">
			    @endif
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{ $submission->users->username }}</td>
		      		<td>{{ $submission->users->nama }}</td>
		      		<td>{{ $submission->tutorial->judul }}</td>
		      		<td><?php echo nl2br($submission->jawaban) ?></td>
		      		@if($submission->status == 0)
		      			<td style="text-align:center">Unchecked</td>
		      		@else
		      			<td style="text-align:center">{{ $submission->nilai }}</td>
		      		@endif
			    </tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
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