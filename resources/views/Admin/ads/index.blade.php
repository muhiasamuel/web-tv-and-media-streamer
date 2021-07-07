@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div> 
		
		<div class="col-sm-12 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif

		<div class="col-sm-12 cat-view">
		<form method="POST" action="{{route('ads.delete')}}">
			@csrf
			<div class="row">				
				<input type="hidden" name="tbl" value="{{encrypt('adverts')}}">
				<input type="hidden" name="tblid" value="{{encrypt('id')}}">
			
				<div class="col-sm-4">
					<select name="bulk-action" class="form-control">
						<option value="0">Bulk Action</option>
						<option value="1">Move to Trash</option>
					</select>
				</div>
				<div class="col-sm-3">
					<button class="btn btn-default">Apply</button>
				</div>
				<div class="col-sm-4 ">
					<input type="text" id="search" class="form-control" placeholder="Search Advert">
				</div> 	
			</div>
			<div class="content">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th><input type="checkbox" id="select-all"> Title</th>
							<th>Url</th>
							<th>Status</th>
							<th>location</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@if(count($ads) > 0 )
						@foreach($ads as $ad)
						<tr>
							<td>{{$ad->id}}</td>
							<td>
								<input type="checkbox" name="select-data[]" value ="{{$ad->id}}"> 
								<a href="#">{{$ad->title}}</a>
							</td>
							<td>{{$ad->url}}</td>
							<td>{{$ad->status}}</td>
							<td>{{$ad->location}}</td>
							<td><img src="{{asset('adverts/images/'.$ad->image)}}" style="width: 50px; height: 30px; border-radius: 5%" alt="portfolio" /></td>
							<th>
								<a href="{{ route('ads.edit', $ad->id)}}">
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