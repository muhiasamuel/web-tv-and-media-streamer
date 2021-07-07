@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Site Settings</h1>
		</div> 
		
		<div class="col-sm-12  cat-form">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dissmissable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a> 
				{{ Session('message')}}
			</div> 
			@endif 
			<h3>Add New Settings</h3>
			@if(empty($data))
			<form method="post" action="{{url('addsettings')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('settings')}}">
			
			<div class="row">
				<div class="form-group row col-sm-3">
					<label>SITE LOGO</label>
					<p>
					    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" required >
					</p>
					<p>
						<label for="file" style="cursor:pointer">Upload Image</label>
					</p>
					<p><img id ="output"/></p>
					<p>This Image will appear as logo on your site.</p>
				</div>
				<div class="form-group row col-sm-3">
					<label>SITE background Image</label>
					<p>
					<input type="file" accept="image/*" name="backgroundimg">
					</p>
					<p><img style="width:250px;height:180px; border-Radius:20px"/></p>
					<p>This Image will appear as logo on your site.</p>
				</div>
				<div class='form-group row col-sm-4 col-sm-offset-1'>
				<label for="contact">Contact Information</label>
						<textarea rows="4" cols="4" name="adress" class="form-control" required></textarea>
						<p class="text-muted">For Example:7th Harley Place, London W1G 8LZ United Kingdom.</p>
						<input type="contact" name="contact" id="contact" class="form-control socialCount">
						<p class="text-muted">For Example: +880) 111 222 3456</p>		
					</div>
				</div>
				<div class="row">
				<div class='form-group row col-sm-6'>
						<label for="about">About Us</label>
						<textarea rows="7" cols="4" name="about" class="form-control" required ></textarea>	
					</div>
					<div id="socialFieldGroup">
						<div class="form-group row col-sm-5 col-sm-offset-1">
							<label>Social Links</label>
							<input type="url" name="social[]" id="social" class="form-control socialCount">
							
							<p class="text-muted">For Example: https://wwww.facebook.com/streetceostv  </p>
							<div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Sorry! </strong> You can't Add More Than 5 Fields.
						</div>	
						</div>
					</div>                  
					<div class="text-right form-group ">
						<span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
					</div>
					</div>
				<div class="form-group col-sm-offset-5">
					<button class="btn btn-primary"> Add Settings</button>
				</div>
			</form>	
			<script>
				var socialCounter = 1;
				$('#addSocialField').click(function(){
					socialCounter++;
					if (socialCounter > 5) {
						$('#socialAlert').show();
						return			
					}
					newDiv = $(document.createElement('div')).attr("class","form-group row col-sm-5 col-sm-offset-1");
					newDiv.after().html(' <input type="url" name="social[]" id="social" class="form-control"></div>');
					newDiv.appendTo("#socialFieldGroup");
				})
			</script>
			@else
			<form method="post" action="{{url('updatesettings')}}/{{$data->sid}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('settings')}}">
			<input type="hidden" name="sid" value="{{$data->sid}}">
			<strong class="text-muted ">To Update, Just remove any info in the field you want to update and add your own infor
			<br>
			the info already in fields is the current data in database. <h3>Once you update you cannot undo the changes</h3>
			 </strong>
			<br>
			<strong>SITE LOGO</strong>
			<div class="row">
			
				<div class="form-group row col-sm-3">
					
					@if(!empty($data->image))
					<p><img src="{{asset('settings/'.$data->image)}}"style="width:200px;height:150px; border-Radius:20px"id="output" ></p>
					<p>
					    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" style="display:none">
					</p>
					<p>
						<label for="file" style="cursor:pointer" class="btn btn-warning">Replace Image</label>
					</p>
					<p>This Image will appear as logo on your site.</p>
					@else
					<p>
					    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" style="display:none">
					</p>
					<p>
						<label for="file" style="cursor:pointer"  class="btn btn-warning">Upload Image</label>
					</p>
					<p><img id ="output"/></p>
					@endif
					</div>
					<div class="form-group row col-sm-3 col-sm-offset-1">
					<label>SITE background Image</label
					@if(empty(!$data->backgroundimg))
					<p><img src="{{asset('settings/bimg/'.$data->backgroundimg)}}"style="width:200px;height:150px; border-Radius:20px" ></p>
					<p>
					    <input type="file" accept="image/*" name="backgroundimg">
						
					</p>
					<p>
					</p>
					<p>This Image will appear as background Image for your site.</p>
					@else
					<p>
					    <input type="file" accept="image/*" name="backgroundimg">
					</p>
					<p>
					</p>
					<p><img style="width:250px;height:180px; border-Radius:20px"/></p>
					@endif
				</div>
				<div class='form-group row col-sm-4 col-sm-offset-1'>
						<label for="contact">Contact Information</label>
						<textarea rows="4" cols="4" name="adress" class="form-control" >{{$data->adress}}</textarea>
						<p class="text-muted">For Example:7th Harley Place, London W1G 8LZ United Kingdom</p>	
						<input type="text" name="contact" id="contact" class="form-control socialCount" value="{{$data->contact}}" >
						<p class="text-muted">For Example: +880) 111 222 3456</p>	
					</div>
			</div>  
			
					<div class='form-group row col-sm-6'>
						<label for="about">About Us</label>
						<textarea rows="7" cols="4" name="about" class="form-control" >{{$data->about}}</textarea>	
					</div>
					<div id="socialFieldGroup">
						<div class="form-group row col-sm-5 col-sm-offset-1">
							<label>Social Links</label>
							@foreach($data->social as $social)
							<input type="url" name="social[]" id="social" class="form-control socialCount" value="{{$social}}" >
							@endforeach
							<p class="text-muted">For Example: https://wwww.facebook.com/streetceostv  </p>
							<div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Sorry! </strong> You can't Add More Than 5 Fields. You can only edit the existing one!
						</div>	
						</div>
					</div>                  
					<div class="text-right form-group ">
						<span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
					</div>
				<div class="form-group col-sm-offset-4">
					<button class="btn btn-primary" >Update Settings</button>
				</div>
			</form>	
			<script>     
				
				socialCounter = $('.socialCount').length;
				$('#addSocialField').click(function(){
					socialCounter++;
					if (socialCounter > 5) {
						$('#socialAlert').removeClass('noshow');
						return			
					}
					newDiv = $(document.createElement('div')).attr("class","form-group row col-sm-5 col-sm-offset-6");
					newDiv.after().html(' <input type="url" name="social[]" id="social" class="form-control"></div>');
					newDiv.appendTo("#socialFieldGroup");
				})
			</script>
			@endif				
		</div>
		<div class="row col-sm-4 col-sm-offset-1 cat-form">
				<p></p>
		</div>
	</div>
</div>
<style>
	.noshow{display:none}
</style>
<script>
	var loadFile = function(event){
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection