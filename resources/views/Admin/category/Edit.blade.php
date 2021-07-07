@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i>Edit Categories</h1>
		</div> 
		
		<div class="col-sm-8 col-sm-offset-1  cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
			<h3>Edit Category</h3>
			<form method="post" action="{{route('category.update', $categorydata->id)}}" enctype="multipart/form-data">
			@csrf
            {{ method_field('PUT')}}
			<input type="hidden" name="tbl" value="{{encrypt('categories')}}">
			<input type="hidden" name="id" value="{{$categorydata->id}}">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="category_name" class="form-control" value="{{$categorydata->title}}">
					<p>The name is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" value="{{$categorydata->slug}}" readonly="">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>

					<div class="row col-sm-12 ">
					<div class='form-group col-sm-6 '>
							<label for="contact">Category Information</label>
							<textarea rows="11" cols="7" name="description" class="form-control" >{{$categorydata->description}}</textarea>
					</div>
					<div class='form-group col-sm-4 col-sm-offset-1'>
					<label>Category Featured Image</label>
						
						@if(!empty($categorydata->FeaturedImage))
							<p><img src="{{asset('categories/'.$categorydata->FeaturedImage)}}"style="width:250px;height:200px; border-Radius:20px"id="output" ></p>
							<p>
								<input type="file" accept="image/*" name="FeaturedImage" id="file" onChange="loadFile(event)" style="display:none">
							</p>
							<p>
								<label for="file" style="cursor:pointer" class="btn btn-warning">Replace Image</label>
							</p>
							@else
							<p>
								<input type="file" accept="image/*" name="FeaturedImage" id="file" onChange="loadFile(event)" style="display:none">
							</p>
							<p>
								<label for="file" style="cursor:pointer"  class="btn btn-warning">Upload Image</label>
							</p>
							<p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>
							@endif
						<p>This Image will appear as gridImage for every Category in your site.</p>
					</div>
				</div>
				<div class='form-group'>
					<label for="status">Status</label>
					<select class='form-control' name="status" id="status">
						<option>{{$categorydata->status}}</option>
						@if($categorydata->status == 'off')
						<option >On</option>
						@else
						<option>off</option>
						@endif
					</select>	
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary">Update Category</button>
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