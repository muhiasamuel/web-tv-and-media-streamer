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
			<form method="post" action="{{url('updatevideo')}}/{{$videodata->id}}"  enctype="multipart/form-data">
            @csrf
			<input type="hidden" name="tbl" value="{{encrypt('videos')}}">
			<input type="hidden" name="id" value="{{$videodata->id}}">
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" id="video_title" class="form-control" value="{{$videodata->title}}">				
						</div>
						<div class="form-group">	
							<input type="text" name="slug" id="slug" class="form-control" value="{{$videodata->title}}">				
						</div>						
						<div class="form-group">		
							<textarea class="form-control" name="description" rows="10" value="{{!!$videodata->description!!}}">{{!!$videodata->description!!}}</textarea>
						</div>
						<div class="row">
						<div class="featured-image col-sm-4 col-sm-offset-1">
							<h4>Set Video Poster Image<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr>	
							@if($videodata->image != '')
							<input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" class="inputfile">
							<p><label for="file" style="cursor: pointer;">Replace the poster image</label></p>
							<p><img src="{{asset('videos/images/'.$videodata->image)}}"style="width:280px;height:170px; border-Radius:20px"id="output" ></p>
							
							@else
							<p><input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" style="display:none"></p>
							<p><label for="file" style="cursor:pointer"  class="btn btn-warning">Upload Image</label></p>
							<p><img style="width:280px;height:170px; border-Radius:20px" id ="output"/></p>
							@endif					
						</div>
						<div class="featured-image col-sm-4 col-sm-offset-1">
						<h4>Set Video<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr>
							@if(!empty($videodata->video))
							<input type="file"  accept="video/*" name="video" id="vfile">
							<p><label for="vfile" style="cursor: pointer;">Replace Video </label></p>
							<p><video src="{{asset('videos/vids/'.$videodata->video)}}"style="width:280px;height:170px; border-Radius:20px"id="output" width="100" height="50" controls>
								
							</video> </p>
							
							@else
							<h4>Set Video<span class=""><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<input type="file"  accept="video/*" name="video" id="vfile">
							<p><label for="vfile" style="cursor: pointer;">Video </label></p>
							<p><img id ="output" style="width:280px;height:170px; border-Radius:20px"/></p>							
							@endif	
												
						</div>
						</div>	
					</div>
					<div class="col-sm-3">
					<div class="content cat-content">
							<h4>Category  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>
							@foreach($categories as $category)	
							<p><label for="{{$category->id}}"><input type="checkbox" name="category_id[]" value="{{$category->id}}" @if(in_array($category->id, $vidcat)) checked @endif> {{$category->title}}</label></p>
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




<script type="text/javascript">
	$(document).ready(function(){
		$('.fa-bars').click(function(){
			$('.sidebar').toggle();
		})
	});
</script>
<script>
	var loadFile = function(event){
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
</script>
<script>
	var loadvFile = function(event){
		var video = document.getElementById('output');
		video.src = URL.createObjectURL(event.target.files[0]);
	};
</script>

@endsection