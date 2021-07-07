@extends('Client.landing.index')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="tsSz0D9C"></script>
<script>
	window.twttr = (function( d, s, id){
		var js, fjs = d.getElementByTagName(s)[0],
		t = window.twttr || {}
		if(d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widjets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f){
			t._e.push(f);
		};
		return t;
	}(document, "script", "twitter-wjs"));
</script>

<section class="breadcrumb-area"style = "background-image:
linear-gradient(to left,rgba(0,0,0,0.85) 1%, rgba(0,0,0,0.68) 20%, rgba(0,0,0,0.5) 40%, rgba(0,0,0,0.35) 60% ,rgba(0,0,0,0.5) 80% ,rgba(0,0,0,0.85) 100%),
url('{{asset('videos/images/'.$singlevideo->image)}}');" >					
	<div class="container">
                      <div class="row"> 
                          <div class="col-lg-12">                          
										
                              			<div class="breadcrumb-area-content">
                              			@if($singlevideo->video != '' )
										<a href="{{asset('videos/vids/'.$singlevideo->video)}}" class="popup-youtube">
										@else
										<a href="{{$singlevideo->videolink}}" class="popup-youtube" style="">
										@endif
										<i class="icofont icofont-ui-play"></i>
									    </a>
                              </div>
                          </div>
                          
                      </div>
					 
                      <div class="cat-description">	
                        <h1>{{$singlevideo->title}}</h1>								
                        <p>{!!substr($singlevideo->description,0,18)!!}..
							 
                    </div>
					
                   
				</div>
			</section>
			<section>
			<div class="share-this">
							<h5>Share This Via..</h5>
							<div class="social-send">
								<div class="fb-share-button" 
								data-href="{{url('videodetail')}}/{{$singlevideo->slug}}" 
								data-layout="button_count" data-lazy="true">
								</div>
								<div class="whatsapp-share-button">
								<a target="_blank" href="https://api.whatsapp.com/send?text=check out this awesome video:{{url('videodetail')}}/{{$singlevideo->slug}}" data-action="share/whatsapp/share"><i class="icofont icofont-social-whatsapp" style="color:rgb(4, 124, 90)"></i></a>
								</div>
								<div class="twitter-share-button">
								<a target="_blank"href="https://twitter.com/intent/tweet?text={{url('videodetail')}}/{{$singlevideo->slug}}" ><i class="icofont icofont-social-twitter" style="border-right:none, color:rgb(4, 60, 90)"></i></a>
								</div>
							</div>	
						</div>
						<!-- Button trigger modal -->
						<div id="modal-btn">
							<h5>About This Video </h5>
							<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#videodescmodal">
							Read More
							</button>
						</div>

						<!-- Modal -->
						<div class="modal-description">
							<div class="modal fade" id="videodescmodal" tabindex="-1" role="dialog" aria-labelledby="videomodaltitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="videomodaltitle">TITLE: {{$singlevideo->title}}</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<h4>Video Description:</h4>
									<p>{!!($singlevideo->description)!!}</p>
								</div>
								<div class="modal-footer">
									<h6>Published On: {{$singlevideo->created_at}}</h6>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>	
						</div>
			
				<div class="container" id="related">
					<h1>You may also like</h1>
					<hr>
						<div class="row">
					<div class="col-lg-12">
						<div class="row portfolio-item">
							
						@foreach($videos as $vid)
							<div class="col-md-3 col-sm-6 released">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
										@if($vid->image != '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$vid->image)}}" />
										@else
										<div class="video"  style="width: 300px; height: 150px;">
										</div>
										@endif
										@if($vid->video != '' )
										<a href="{{url('videodetail')}}/{{$vid->slug}}" class="popin-youtube">
										@else
										<a href="{{url('videodetail')}}/{{$vid->slug}}" class="popin-youtube" style="width: 300px; height: 150px;">
										@endif
										<i class="icofont icofont-ui-play"></i>
									    </a>
										
										</a>
									
									</div>
									<div class="portfolio-content">
									
										<div class="review">
										<h6>{{$vid->title}}</h6>
										
											<div class="author-review">
											<p>{{$vid->views}} <i class="icofont icofont-eye"></i> views</p>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							@endforeach	
							
							
						</div>
						<div class="d-flex justify-content-center" style="">								
								{!! $videos->links() !!}
							</div>
    </div>
</section>

@endsection