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
				<form method="post" action="{{url('add-pages')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="tbl" value="{{encrypt('pages')}}">
					<div class="col-sm-12">
						<div class="form-group">	
							<input type="text" name="title" id="video_title" class="form-control" placeholder="Enter title here" required>				
						</div>
						<div class="form-group">	
							<input type="text" name="slug" id="slug" class="form-control" placeholder="page slug">				
						</div>						
						<div class="form-group">
							<label for="page">Page Content</label>		
							<textarea class="form-control" name="description" rows="10" placeholder="page description" required></textarea>
						</div>
						<div class='form-group col-md-6'>
							<label for="status">Status</label>
							<select class='form-control' name="status" id="status">
								<option value="on">On</option>
								<option value="off">off</option>
							</select>	
						</div>
									
					</div>
					<div class="col-sm-12 col-sm-offset-4">
						<button class="btn btn-primary pull-center" >Publish</button>
					</div>
				</form>
			</div>
		</div>
		<div>
		</div>
	</div>
</div>

@endsection