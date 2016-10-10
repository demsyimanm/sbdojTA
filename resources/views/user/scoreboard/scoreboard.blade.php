@extends ('user.masterUser')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="bar chart  icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Scoreboard event "{{$event->judul}}"
	  	</div>
	  </h1>
	</div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="25%" style="text-align:center">NRP</th>
		        <?php $sum = 0;?>
		        @foreach($question as $quest)
		        	<th style="text-align:center">{{ $quest->judul }}</th>
		        	<?php $sum += 1;?>
		        @endforeach
	        	<th style="text-align:center">Total</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach($nilai as $key	 => $value)
	    	<tr>
		    	<td style="text-align:center"><?php echo $i++ ?></td>
		    		<?php $nilai_tot = 0;?>
	    			@foreach($value as $item)
				    	<td cstyle="text-align:center"><?php echo $item ?></td>
			        @endforeach
			    	
	    	</tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
  </div>
</div>
@endsection