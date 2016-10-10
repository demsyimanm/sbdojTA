@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="trophy icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Pertanyaan event "{{$eve->judul}}"
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{URL::to('questions/add/'.$eve->id)}}">
		<i class="trash icon"></i>
		Tambah Pertanyaan
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="25%" style="text-align:center">Judul</th>
		        <th width="25%" style="text-align:center">Pertanyaam</th>
	        	<th width="25%" style="text-align:center">Jawaban</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($question as $quest)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td><a href="{{ URL::to('questions/edit/'.$eve->id.'/'.$quest->id ) }}" >{{ $quest->judul }}</a></td>
		      		<td><?php echo nl2br(substr($quest->konten,0,30))." ..."?></td>
	      			<td><?php echo nl2br(substr($quest->jawaban,0,30))." ..."?></td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('questions/edit/'.$eve->id.'/'.$quest->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('questions/remove/'.$eve->id.'/'.$quest->id) }}')">
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
  	Hapus Data Pertanyaan
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Pertanyaan ini?</p></center>
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