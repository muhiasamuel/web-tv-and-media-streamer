@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Add New Advert</h1>
		</div> 
		
		<div class="col-sm-8 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
			<h3>Add New Category</h3>
			<form method="post" action="{{route('addads')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('adverts')}}">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="ad_name" class="form-control">
				</div>

				<div class="form-group">
					<label>Ad Url</label>
					<input type="url" name="url" id="url" class="form-control">
					<p>The is the URL is the external link to the advert</p>
				</div>
				<div class='form-group'>
				<label>Advert Image</label>
					<p>
					    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" >
					</p>
					<p>
						<label for="file" style="cursor:pointer">Upload Image</label>
					</p>
					<p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>
					<p>This Image will appear as Image of your Advert.</p>
				</div>
                <div class='form-group'>
					<label for="status">Location</label>
					<select class='form-control' name="location" id="location">
						<option value="Leaderboard">Leaderboard</option>
						<option value="Sidebartop">Sidebartop</option>
                        <option value="Sidebarbottom">Sidebarbottom</option>
                        <option value="Footer">Footer</option>
					</select>	
				</div>
				<div class='form-group'>
					<label for="status">Status</label>
					<select class='form-control' name="status" id="status">
						<option value="on">On</option>
						<option value="off">off</option>
					</select>	
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Advert</button>
				</div>
			</form>	


		</div>
	</div>
</div>
</style>
<script>
	var loadFile = function(event){
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
@endsection