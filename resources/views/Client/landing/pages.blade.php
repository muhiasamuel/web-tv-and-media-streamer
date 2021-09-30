@extends('Client.landing.index')

@section('content')

<div class="container">
	<div class="row"> 
	    <div class="col-lg-12">	
            <div class="breadcrumb-area-content">									
				<h1>{{$page->title}}</h1>
			</div>
		</div>
	</div>				
</div>
<div class="container">
{!!($page->description) !!}
</div>
@endsection