@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="student icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Tutorial
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{url('categories/add')}}">
		<i class="plus icon"></i>
		Tambah Kategori Tutorial
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="15%" style="text-align:center">Category</th>
		        <th width="40%" style="text-align:center">Detail</th>
	        	<th width="15%" style="text-align:center">Manage Questions</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($categories as $category)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td style="text-align:center">{{ $category->name }}</td>
		      		<td style="text-align:center">{{ $category->detail }}</td>
		      		<td style="text-align:center">
		      			<a class="ui icon purple button" href="{{ URL::to('tutorial/manage/'. $category->id) }}">
				        	<i class="pencil icon"></i>
				        	Manage Questions
				      	</a>
				    </td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('categories/edit/'. $category->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('categories/remove/'. $category->id) }}')">
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
  	Hapus Data Tutorial
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Tutorial ini?</p></center>
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