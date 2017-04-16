@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:20%;padding-right:20%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="database icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Versi Database
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{url('databases/version/add')}}">
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
		        <th width="20%" style="text-align:center">Nama</th>
		        <th width="35%" style="text-align:center">Import</th>
	        	<th width="20%" style="text-align:center">Parameter</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($versions as $version)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{ $version->nama }}</td>
		      		<td>{{ $version->import }}</td>
		      		<td>
		      			<ul>
			      			@foreach($version->dbversionparameter as $parameter)
			      				<li>{{$parameter->parameter}}</li>
			      			@endforeach
		      			</ul>
		      		</td>
			      	<td class="center" style="">
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('databases/version/edit/'. $version->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>
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
<?php 
if(Session::has('status') && Session::get('status') == 'success'){
        echo '<script language="javascript">';
            echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
            echo '</script>';
      }
?>
@endsection