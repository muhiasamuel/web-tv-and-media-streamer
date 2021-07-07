
@extends('layouts.main')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title" id='addvideo'>
      <h1><i class="fa fa-bars"></i> All Pages <a href="{{ url('video') }}"><button class="btn btn-sm btn-default">Add New</button></a> </h1>
    </div>
    <div class="col-sm-5 cat-form">
		@if(Session::has('message'))
		<div class="alert alert-success alert-dissmissable fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a> 
			{{ Session('message')}}
		</div> 
		@endif 
    </div> 
    <div class="col-sm-12">
    <form method="POST" action="{{url('pagedelete')}}">
    <div class="clearfix"></div>

    <div class="filter-div">
 
			@csrf
        <div class="col-sm-3">

        <input type="hidden" name="tbl" value="{{encrypt('pages')}}">
				<input type="hidden" name="tblid" value="{{encrypt('id')}}">

					<select name="bulk-action" class="form-control">
						<option value="0">Bulk Action</option>
						<option value="1">Move to Trash</option>
					</select>
				</div>
        </div>

        <div class="col-sm-1">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>  
        </div>
      
     
      <div class="col-sm-3 col-sm-offset-6">
        <input type="text" id="search"  class="form-control" placeholder="Search pages">
        
      </div>
      <div class="col-sm-2 text-right">
      </div>
       <hr>
    <div>
    <hr>
    </div>
    </div>  
    
   
      <div class="content">
        <table class="table table-responsive" id="myTable">
          <thead>
            <tr>
              <th width="10%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">slug</th>
              <th width="10">Description</th>
              <th width="15%">status</th>
              <th width="10%">Date</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($pages))
          @foreach($pages as $page)
            <tr>
              <td>
                <input type="checkbox" name="select-data[]" value ="{{$page->id}}"> 
             	{{$page->title}}
               
              </td>
              <td>{{$page->slug}}</td>
              <td>{{$page->description}}</td>
              <td>{{$page->status}}</td>
              <td>{{$page->created_at}}</td>
              <th>
								<a href="{{ route('pages.edit', $page->id)}}">
									<button type="button" class="btn btn-success float-left">
										<i class="fa fa-edit">edit</i>
									</button>
							</th>                
            </tr>
          @endforeach
          @else
          <tr>
            <td>No videos Found</td>
          </tr> 
          @endif           
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection