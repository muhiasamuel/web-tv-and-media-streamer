@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Users</h1>
		</div> 
		
		<div class="col-sm-5 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
			<h3>Add New User</h3>
			<form method="post" action="{{route('createUsers')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="tbl" value="{{encrypt('users')}}">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" id="name" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class='form-group '>
						<label for="contact">Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary">Add New User</button>
				</div>
			</form>	


		</div>

		<div class="col-sm-7 cat-view">
		<form method="POST" action="{{route('deleteUsers')}}">
			@csrf
			<div class="row">				
				<input type="hidden" name="tbl" value="{{encrypt('users')}}">
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
							<th>Email</th>
							<th>Verified</th>
							<th>Created At</th>							
						</tr>
					</thead>
					<tbody>
					@if(count($users) > 0 )
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>
								<input type="checkbox" name="select-data[]" value ="{{$user->id}}"> 
								<a href="#">{{$user->name}}</a>
							</td>
							<td>{{$user->email}}</td>
							<td>{{$user->email_verified_at}}</td>
							<td>{{$user->created_at}}</td>
							
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

@endsection