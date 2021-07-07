@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div> 
		
		<div class="col-sm-5 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
			<h3>Add New Category</h3>
			<form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('categories')}}">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="category_name" class="form-control" required>
					<p>The name is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" readonly="">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>
				<div class='form-group '>
						<label for="contact">Category Information</label>
						<textarea rows="4" cols="4" name="description" class="form-control" ></textarea>
				</div>
				<div class='form-group'>
				<label>Category Featured Image</label>
					<p>
					    <input type="file" accept="image/*" name="FeaturedImage" id="file" onChange="loadFile(event)" required>
					</p>
					<p>
						<label for="file" style="cursor:pointer">Upload Image</label>
					</p>
					<p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>
					<p>This Image will appear as gridImage for every Category.</p>
				</div>
				<div class='form-group'>
					<label for="status">Status</label>
					<select class='form-control' name="status" id="status">
						<option value="on">On</option>
						<option value="off">off</option>
					</select>	
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Category</button>
				</div>
			</form>	


		</div>

		<div class="col-sm-7 cat-view">
		<form method="POST" action="{{route('category.delete')}}">
			@csrf
			<div class="row">				
				<input type="hidden" name="tbl" value="{{encrypt('categories')}}">
				<input type="hidden" name="tblid" value="{{encrypt('id')}}">
			
				<div class="col-sm-3">
					<select name="bulk-action" class="form-control">
						<option value="0">Bulk Action</option>
						<option value="1">Move to Trash</option>
					</select>
				</div>
				<div class="col-sm-2">
					<button class="btn btn-default">Apply</button>
				</div>
				<div class="col-sm-3 col-sm-offset-3">
					<input type="text" id="search" class="form-control" placeholder="Search Category">
				</div> 	
			</div>
			<div class="content">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th><input type="checkbox" id="select-all"> Name</th>
							<th>Slug</th>
							<th>Status</th>
							<th>description</th>
							<th>FeaturedImage</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@if(count($data) > 0 )
						@foreach($data as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>
								<input type="checkbox" name="select-data[]" value ="{{$category->id}}"> 
								<a href="#">{{$category->title}}</a>
							</td>
							<td>{{$category->slug}}</td>
							<td>{{$category->status}}</td>
							<td>{{$category->description}}</td>
							<td><img src="{{asset('categories/'.$category->FeaturedImage)}}" style="width: 50px; height: 30px; border-radius: 5%" alt="portfolio" /></td>
							<th>
								<a href="{{ route('category.edit', $category->id)}}">
									<button type="button" class="btn btn-success float-left">
										<i class="fa fa-edit">edit</i>
									</button>
							</th>
						</tr>
						@endforeach
						@else
						<tr>
							<td>No Data Found</td>
						</tr>
					@endif	
					</tbody>
				</table>
			</div>
			
		</div>  						
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