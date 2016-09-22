@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:20%;padding-right:20%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="users icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Account
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{url('accounts/add')}}">
		<i class="trash icon"></i>
		Tambah User
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="20%" style="text-align:center">NRP</th>
		        <th width="35%" style="text-align:center">Nama</th>
	        	<th width="10%" style="text-align:center">Role</th>
	        	<th width="10%" style="text-align:center">Kelas</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($users as $user)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td><a href="{{ URL::to('admin/user/update/'. $user->id) }}" >{{ $user->username }}</td>
		      		<td>{{ $user->nama }}</td>
		      		<td>{{ $user->role->nama }}</td>
		      		<td class="text-center">{{ $user->kelas }}</td>
			      	<td class="center" style="">
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('accounts/edit/'. $user->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('accounts/remove/'. $user->id) }}')">
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
  	Hapus Data User
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus data User ini?</p></center>
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