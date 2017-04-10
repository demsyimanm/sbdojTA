@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text grid" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px" class="sixteen wide column">
	  <h1 class="ui dividing header">
	  	<i class="student icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Soal Tutorial Tutorial "{{$event->judul}}"
	  	</div>
	  </h1>
	</div>
	<div class="ui grid">
		<div style="" class="twelve wide column">
		  <div style="padding-top:3%;padding-bottom:3%">
			  <a class="ui icon teal button" href="{{url('tutorial/questions/add/'.$event->id)}}">
				<i class="plus icon"></i>
				Tambah Pertanyaan Tutorial
			  </a>
		  </div>
		  <div style="padding:0%;padding-top:0px">
		  <div class="ui blue segment" style="height:80%">
			<table class="ui celled table segment table-hover" id="matkul">
			  <thead>
			    <tr>
			        <th width="10%" style="text-align:center">Kategori</th>
			        <th width="10%" style="text-align:center">Judul</th>
			        <th width="22,5%" style="text-align:center">Soal</th>
		        	<th width="22,5%" style="text-align:center">Jawaban</th>
		        	<th width="15%"  style="text-align:center">Action</th>
		      	</tr>
		      </thead>
			  <tbody>
			  	@foreach ($tutorials as $tutorial)
				    <tr>
				      	<td style="text-align:center">{{ $tutorial->category->name }}</td>
			      		<td style="text-align:center">{{ $tutorial->judul }}</td>
			      		<td style="text-align:center"><?php echo substr($tutorial->konten,0,30)."..." ?></td>
			      		<td style="text-align:center"><?php echo substr($tutorial->jawaban,0,30)."..." ?></td>
			      		<td>
					      	<center>
						      	<a class="ui icon blue button mini ui button" href="{{ URL::to('tutorial/questions/edit/'.$event->id.'/'. $tutorial->id) }}">
						        	<i class="pencil icon"></i>
						      	</a>

						      	<button class="ui icon test red button del mini ui button" onclick="dele('{{URL::to('tutorial/questions/remove/'.$event->id.'/'. $tutorial->id) }}')">
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
	  <div style="" class="four wide column">
		  <div style="padding-top:10%;padding-bottom:9%">
			  <a class="ui icon teal button" href="{{url('categories/add')}}">
				<i class="plus icon"></i>
				Tambah Kategori
			  </a>
		  </div>
		  <div style="padding:0%;padding-top:0px">
		  <div class="ui blue segment" style="height:80%">
			<table class="ui celled table segment table-hover" id="category">
			  <thead>
			    <tr>
			        <th width="15%" style="text-align:center">Kategori</th>
			        <th width="10%"  style="text-align:center">Action</th>
		      	</tr>
		      </thead>
			  <tbody>
			  	@foreach ($categories as $category)
				    <tr>
				      	<td style="text-align:center">{{ $category->name }}</td>
			      		<td>
					      	<center>
						      	<a class="ui icon blue button mini ui button" href="{{ URL::to('categories/edit/'.$category->id) }}">
						        	<i class="pencil icon"></i>
						      	</a>
						      	<button class="ui icon test red button delCat mini ui button" onclick="deleCat('{{URL::to('categories/remove/'.$category->id) }}')">
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

<div id="modaldivCat" class="ui small basic test modal" >
  <div class="ui icon header">
  	<i class="trash icon"></i>
  	Hapus Data Kategori
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data Katgeori ini?</p></center>
  </div>
  <div class="actions">
  	<div class="ui red basic cancel inverted button">
    	<i class="remove icon"></i>
    	No
  	</div>
  	<a class="ui green ok inverted button button_modal_cat">
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
<script type="text/javascript">
	function deleCat(id){
        $('#modaldivCat').modal('show');
        $('.button_modal_cat').attr({href:id});
	};
</script>
<script> 
  $(function () {
    $("#matkul").DataTable();
        });
</script>
@endsection