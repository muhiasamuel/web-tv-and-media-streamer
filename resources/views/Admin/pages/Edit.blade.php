@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Page</h1>
		</div>

		<div class="col-sm-12">
		    @if(Session::has('message'))
			<div class="alert alert-success alert-dissmissable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a> 
				{{ Session('message')}}
			</div> 
			@endif 
			<div class="row">
				<form method="post" action="{{url('update-pages')}}/{{$page->id}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="tbl" value="{{encrypt('pages')}}">
					<div class="col-sm-12">
						<div class="form-group">	
							<input type="text" name="title" id="video_title" class="form-control" value="{{$page->title}}">				
						</div>
						<div class="form-group">	
							<input type="text" name="slug" id="slug" class="form-control" value="{{$page->slug}}">				
						</div>						
						<div class="form-group">
							<label for="page">Page Content</label>		
							<textarea class="form-control" name="description" rows="10" value="{{$page->description}}">{{$page->description}}</textarea>
						</div>
						<div class='form-group'>
							<label for="status">Status</label>
							<select class='form-control' name="status" id="status">
								<option>{{$page->status}}</option>
								@if($page->status == 'off')
								<option >On</option>
								@else
								<option>off</option>
								@endif
							</select>	
						</div>
									
					</div>
					<div class="col-sm-12 col-sm-offset-4">
						<button class="btn btn-primary pull-center" >Update</button>
					</div>
				</form>
			</div>
		</div>
		<div>
		</div>
	</div>
</div>


@endsection