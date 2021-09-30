@extends('Client.landing.index')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
	@php
	$value = explode('=',$singlevideo->videolink);
 		$value = $value[1];
	@endphp										
										
<section class="videodetail-area"style = "background-image:
linear-gradient(to left,rgba(0,0,0,0.85) 1%, rgba(0,0,0,0.68) 20%, rgba(0,0,0,0.5) 40%, rgba(0,0,0,0.35) 60% ,rgba(0,0,0,0.5) 80% ,rgba(0,0,0,0.85) 100%),
url('https://i.ytimg.com/vi/{{$value}}/sddefault.jpg'); width:100%;height:100%;scroll-margin-top:15rem; " >					
			<div class="container">                        
				<div class="breadcrumb-area-content">
          			@if($singlevideo->video != '' )
					<a href="{{asset('videos/vids/'.$singlevideo->video)}}" class="popup-youtube">
					@else
					<a href="{{$singlevideo->videolink}}?rel=0" class="popup-youtube" style="">
					@endif
					<i class="icofont icofont-ui-play"></i>
					</a>
                </div>              
	               <div class="cat-description">	
                        <h5>{!! substr($singlevideo->title,0,65) !!}...</h5>							 
             	 </div>
			  			<div class="share-this">							
							<div class="social-send">
								<div class="fb-share-button" 
								data-href="{{url('videodetail')}}/{{$singlevideo->slug}}" 
								data-layout="button_count" data-lazy="true">
								</div>
								<div class="whatsapp-share-button">
								<a target="_blank" href="https://api.whatsapp.com/send?text=check out this awesome video:{{url('videodetail')}}/{{$singlevideo->slug}}" data-action="share/whatsapp/share"><i class="icofont icofont-social-whatsapp" style="color:rgb(9, 211, 127)"></i></a>
								</div>
								<div class="twitter-share-button">
								<a target="_blank"href="https://twitter.com/intent/tweet?text={{url('videodetail')}}/{{$singlevideo->slug}}" ><i class="icofont icofont-social-twitter" style="border-right:none; color:#3888f0"></i></a>									
								</div>
							</div>
							<div class="toggle-share">
							<i class="icofont icofont-share"></i>
							</div>	
						</div>
			
                  		<div class="views">					
                            <h6>
                                {{$singlevideo->views + 1}} |
                                <i class="icofont icofont-eye" ></i>|
                                @if($singlevideo->views != 0)
                                views
                                @else
                                View
                                @endif
                            </h6>
                        </div>
</div>
			</section>
			<section>
			<div class="row" id = "overtrue">
				<div class="fav " id="{{ $singlevideo->id }}">
					@if(auth()->user()->hasFavorited($singlevideo))
					<i class="icofont icofont-minus" > From Watchlist </i>
					@else
					<i class="icofont icofont-plus" >To Watchlist </i>
                	@endif
												
				</div>
					<div  class="panel " id="{{ $singlevideo->id }}">
				<span>
					<div id="like{{$singlevideo->id}}-bs3">
							 @if(auth()->user()->hasLiked($singlevideo))
							 @if($singlevideo->likers()->get()->count() > 1)
							 <p>You and {{ $singlevideo->likers()->get()->count() }} others liked</p>
							 @else
							 <p>You liked this video</p>
							 @endif
							 @else
							 @if( $singlevideo->likers()->get()->count() == 1)
							 <p>Liked by {{ $singlevideo->likers()->get()->count() }} person</p>
							 @else
							 <p>Liked by {{ $singlevideo->likers()->get()->count() }} People</p>
							 @endif
							 @endif
							 </div>
							 @if(auth()->user()->hasLiked($singlevideo))
						 <i id="liked{{$singlevideo->id}}"style="color: #f70475" class="icofont icofont-thumbs-up"></i>
							@else
						<i id="liked{{$singlevideo->id}}" style="color:white" class="icofont icofont-thumbs-down"></i>
                                          @endif
						@if(auth()->user()->hasFavorited($singlevideo))
						<i class="icofont icofont-love" style="color:#ff0000"> </i>
						@else
						<i class=" icofont icofont-love" style="color:#fff"></i>
                                          @endif
					</div>
				</span>
			</div>
					
						<!-- Button trigger modal -->
						<div id="modal-btn">
							<button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#videodescmodal">
							<p style="font-size:11px;">About this video</p>
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
						</div>
			
				<div class="container" id="related">
					<h3>You may also like</h3>
					<hr>
						<div class="row">
					<div class="col-lg-12">
						<div class="row portfolio-item">
						
						@foreach($videos as $video)
						<div class="col-md-3 col-sm-4 top">
								<div class="single-portfolio">
									<div class="single-portfolio-img">
									@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 280px; height: 180px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
										@if($video->video != '' )
										<a href="{{url('videodetail')}}/{{$video->slug}}" class="popin-youtube">
										@else
										<a href="{{url('videodetail')}}/{{$video->slug}}" class="popin-youtube" style="width: 300px; height: 150px;">
										@endif
										<i class="icofont icofont-ui-play"></i>
									    </a>
										<p>{{$video->views}} <i class="icofont icofont-eye"></i> views</p>
																				
										</a>
										<div class="favorite">
										
										<div class="fav " id="{{ $video->id }}">
												@if(auth()->user()->hasFavorited($video))
												<i class="icofont icofont-minus" > From Watchlist </i>
												@else
												<i class="icofont icofont-plus" >To Watchlist </i>
                                                @endif
												
											</div>
										</div>
									
									</div>
									<div class="portfolio-content">
										<div class="review">
										<h6>{{$video->title}}</h6>
										
										<div class="row" id = "overtrue">
											
											<div  class="panel " id="{{ $video->id }}">
											<span>
											<div id="like{{$video->id}}-bs3">
													 @if(auth()->user()->hasLiked($video))
													 @if($video->likers()->get()->count() > 1)
													 <p>You and {{ $video->likers()->get()->count() }} others liked</p>
													 @else
													 <p>You liked this video</p>
													 @endif
													 @else
													 @if( $video->likers()->get()->count() == 1)
													 <p>Liked by {{ $video->likers()->get()->count() }} person</p>
													 @else
													 <p>Liked by {{ $video->likers()->get()->count() }} People</p>
													 @endif
													 @endif
													 </div>
													 @if(auth()->user()->hasLiked($video))
												 <i id="liked{{$video->id}}"style="color: #f70475" class="icofont icofont-thumbs-up"></i>
													@else
												<i id="liked{{$video->id}}" style="color:white" class="icofont icofont-thumbs-down"></i>
                                                @endif
                                                
												@if(auth()->user()->hasFavorited($video))
												<i class="icofont icofont-love" style="color:#ff0000"> </i>
												@else
												<i class=" icofont icofont-love" style="color:#fff"></i>
                                                @endif
											</div>
											</span>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							@endforeach	
						
						</div>
							</div>
    </div>
</section>

@endsection