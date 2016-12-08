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
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="25%" style="text-align:center">Judul</th>
		        <th width="20%" style="text-align:center">Waktu Mulai</th>
	        	<th width="20%" style="text-align:center">Waktu Akhir</th>
	        	<th width="5%" style="text-align:center">Kelas</th>
	        	<th width="25%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($event as $eve)
		  		<?php
	      			date_default_timezone_set('Asia/Jakarta'); // CDT
					$current_date = date("Y-m-d H:i:s", time());
	      		?>
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		@if($eve->waktu_mulai < $current_date && $eve->waktu_akhir < $current_date || $current_date < $eve->waktu_mulai)
		      			<td><a href="#" class="disabled" disabled="">{{ $eve->judul }}</td>
		      		@else
		      			<td><a href="{{ URL::to('questions/'. $eve->id) }}" >{{ $eve->judul }}</td>
		      		@endif
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
		      		<td class="text-center">{{ $eve->kelas }}</td>
		      		<td>
				      	<center>
					      	@if($eve->waktu_mulai < $current_date && $eve->waktu_akhir < $current_date || $current_date < $eve->waktu_mulai )
				      			<a href="#" class="ui right labeled icon primary button disabled"><i class="right arrow icon" style="height:135%"></i> Pilih</a>
				      		@else
				      			<a href="{{ URL::to('questions/'. $eve->id) }}" class="ui right labeled icon primary button"><i class="right arrow icon" style="height:135%"></i> Pilih</a>
				      		@endif
				      		<a href="{{ URL::to('submissions/'. $eve->id) }}" class="ui right labeled icon green button"><i class="right arrow icon" style="height:135%"></i> Lihat Submission</a>
				      	</center>
			      	</td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
  </div>
</div>
<script> 
  $(function () {
    $("#matkul").DataTable();
        });
</script>
@endsection