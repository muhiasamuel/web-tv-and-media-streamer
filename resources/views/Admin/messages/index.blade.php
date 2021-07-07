@extends('layouts.main')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Messages</h1>
		</div> 
		
		<div class="col-sm-12 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif

		<div class="col-sm-12 cat-view">
		<form method="POST" action="{{route('messages.delete')}}">
			@csrf
			<div class="row">				
				<input type="hidden" name="tbl" value="{{encrypt('messages')}}">
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
					<input type="text" id="search" class="form-control" placeholder="Search messages">
				</div> 	
			</div>
			<div class="content">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th><input type="checkbox" id="select-all">Sender Name</th>
							<th>Email</th>
							<th>phone</th>
							<th>message</th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody>
					@if(count($messages) > 0 )
						@foreach($messages as $message)
						<tr>
							<td>{{$message->id}}</td>
							<td>
								<input type="checkbox" name="select-data[]" value ="{{$message->id}}"> 
								<a href="#">{{$message->name}}</a>
							</td>
							<td>{{$message->email}}</td>
							<td>{{$message->phone}}</td>
							<td>{{$message->message}}</td>
                            <td>{{$message->status}}</td>
							
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