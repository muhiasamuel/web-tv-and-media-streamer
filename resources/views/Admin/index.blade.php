@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
  
<div class="container-fluid">
	<div class="row">
    <div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Admin Home</h1>
		</div>
          </div>
        <div class="content" >
        <div class="box"  >
        <div class="col-lg-3 col-6 mr-4">
            <!-- small box -->
            <div class="small-box btn btn-success">
              <div class="inner">
                <h3>Videos</sup></h3>

                <p>45</p>
              </div>
              <div class="icon">
                <i class="fa fa-bars"></i>
              </div>
              <a href="{{ url('videolist') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn btn-warning">
              <div class="inner">
                <h3>Add Video</h3>

                <p>...</p>
              </div>
              <div class="icon">
                <i class="fa fa-person-add"></i>
              </div>
              <a href="{{ url('/video') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn btn-danger">
              <div class="inner">
                <h3>Vids Categories</h3>

                <p>4+</p>
              </div>
              <div class="icon">
                <i class="fa fa-pie-graph"></i>
              </div>
              <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn btn-info">
              <div class="inner">
                <h3>Users</h3>

                <p>Add Users</p>
              </div>
              <div class="icon"> 
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('AllUsers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
          <!-- ./col -->
          <div class="row">
              <div class="content">
                  
                  <div class="col-md-5">
                  <h3>Quick Links</h3> 
                     <section>
                         <ul>
                             <li><h3><a href="{{ url('/allmessages')}}">Messages</a></h3></li>
                             <li><h3><a href="{{ url('/allads') }}">Adverts</a></h3></li>
                             <li><h3><a href="{{url('setting')}}">Settings</a></h3></li>
                             <li><h3><a href="{{ url('/allpages') }}">Pages</a></h3></li>
                         </ul>
                     </section>   
                  </div>

                  <div class="col-md-5">
                      <section>
                        <p><img src="{{asset('settings/2106185501021061125828Street CEOs TM white.png')}}"style="width:400px;height:200px; border-Radius:20px"id="output" ></p>
                      </section>
                     
                  </div> 
                        
              </div>
          </div>
        </div>
        </div>
    </div>
     
</div>
@endsection