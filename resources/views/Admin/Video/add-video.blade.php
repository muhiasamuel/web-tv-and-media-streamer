@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Videos</h1>
		</div>

		<div class="col-sm-12">
		    @if(Session::has('message'))
			<div class="alert alert-success alert-dissmissable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a> 
				{{ Session('message')}}
			</div> 
			@endif 
			<div class="row">
				<form method="post" action="{{url('add-video')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="tbl" value="{{encrypt('videos')}}">
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" id="video_title" class="form-control" placeholder="Enter title here" required>				
						</div>
						<div class="form-group">	
							<input type="text" name="slug" id="slug" class="form-control" placeholder="video slug" required>				
						</div>						
						<div class="form-group">
						<label for="vedeo_desc">Video Description: </label>		
							<textarea class="form-control" name="description" rows="10" placeholder="Video description" ></textarea>
						</div>
						<div class="row">
						<div class="featured-image col-sm-3 form-group  ">
							<h4>Set Video Poster Image<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" class="inputfile">
							<p><label for="file" style="cursor: pointer;">Video Poster Image</label></p>
							<p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>							
						</div>
						<div class="row">
							<div class="featured-image col-sm-2 col-sm-offset-1 form-group">
								<h4>Set Video<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr>	
								<input type="file"  accept="video/*" name="video" id="vfile" >
								<p><label for="vfile" style="cursor: pointer;">Video </label></p>
								<p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>							
							</div>
							
							<p class="text-muted"><strong>Note That you can either add a video or a video link but not both!!</strong> </p>
								<div class="form-group col-sm-4 col-sm-offset-1 form-group">
									<p>OR</p>
									<strong><h4>Add a Video Link<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr></strong>
									<input type="url" name="videolink" class="form-control" placeholder="add a videolink" >
									<p class="text-muted">For Example: https://www.youtube.com/watch?v=zEo6ngA8nfk </p>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-sm-3">
					<div class="content cat-content form-group">
							<h4>Category  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>
							@foreach($categories as $category)	
							<p><label for="cat1"><input type="checkbox" name="category_id[]" value="{{$category->id}}"> {{$category->title}}</label></p>
							@endforeach
						</div>
						<hr>
						<div class="content publish-box">
							<h4>Publish  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<div class="form-group">
								<button class="btn btn-default" name="status" value="draft">Save Draft</button>
							</div>
							<p>Status: Draft <a href="#"><button class="btn btn-primary"> <i class="fa fa-edit">edit</i></button></a></p>
							<p>Visibility: Public <a href="#"><button class="btn btn-primary"> <i class="fa fa-edit">edit</i></button></a></p>
							<p>Publish: Immediately <a href="#"><button class="btn btn-primary"> <i class="fa fa-edit">edit</i></button></a></p>
							<div class="row">
								<div class="col-sm-12 main-button">
									<button class="btn btn-primary pull-right" class="publish" name="status" value="publish" >Publish</button>
								</div>
							</div>	
						</div>
						
						
						
					</div>
				</form>
			</div>
		</div>
		<div>
		</div>
	</div>
</div>
<script>
	var loadFile = function(event){
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>


@endsection