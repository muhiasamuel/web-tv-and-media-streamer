@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i>Edit Adverts</h1>
		</div> 
		
		<div class="col-sm-8 col-sm-offset-1  cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
			<h3>Edit Advert</h3>
			<form method="post" action="{{route('ads.update', $adverts->id)}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('adverts')}}">
			<input type="hidden" name="id" value="{{$adverts->id}}">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="ad_name" class="form-control" value="{{$adverts->title}}">
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="url" name="url" id="url" class="form-control" value="{{$adverts->url}}" >
					<p>The  URL is an external link to this advert</p>
				</div>

					<div class="row col-sm-12 ">
					
                        <div class='form-group col-sm-4 col-sm-offset-1'>
                        <label>Advert Image</label>
                            
                            @if(!empty($adverts->image))
                                <p><img src="{{asset('adverts/images/'.$adverts->image)}}"style="width:250px;height:200px; border-Radius:20px"id="output" ></p>
                                <p>
                                    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" style="display:none">
                                </p>
                                <p>
                                    <label for="file" style="cursor:pointer" class="btn btn-warning">Replace Image</label>
                                </p>
                                @else
                                <p>
                                    <input type="file" accept="image/*" name="image" id="file" onChange="loadFile(event)" style="display:none">
                                </p>
                                <p>
                                    <label for="file" style="cursor:pointer"  class="btn btn-warning">Upload Image</label>
                                </p>
                                <p><img id ="output" style="width:200px;height:150px; border-Radius:20px"/></p>
                                @endif
                            <p>Advert image for your site</p>
                        </div>
                        <div class='form-group col-sm-5 col-sm-offset-1'>
                        <label for="status">Location</label>
                        <select class='form-control' name="location" id="location">
                            <option>{{$adverts->location}}</option>
                            <option value="Leaderboard">Leaderboard</option>
                            <option value="Sidebartop">Sidebartop</option>
                            <option value="Sidebarbottom">Sidebarbottom</option>
                            <option value="Footer">Footer</option>
                        </select>	
                        </div>
				</div>
				<div class='form-group'>
					<label for="status">Status</label>
					<select class='form-control' name="status" id="status">
						<option>{{$adverts->status}}</option>
						@if($adverts->status == 'off')
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