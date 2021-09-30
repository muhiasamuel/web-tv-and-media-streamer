@extends('Client.landing.index')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- hero area start -->
		<section class="hero-area" style="background-image: url('{{asset('settings/bimg/'.$settings->backgroundimg)}}')" id="home">
			<div class="container">
				<div class="hero-area-slider">
				@foreach($videos as $key=>$video)
					@if($key == 0)
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
							<a id="video"  href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> </a>
							@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2>{{$video->title}}</h2>
								
								<p>{!!($video->description)!!}</p>
							
								<div class="slide-trailor">
									<h3> Watch This Video Here</h3>
									<a class="theme-btn theme-btn1" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> Video</a>
								</div>
								<div class="">
									............................................................
								</div>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4 class="theme-btn theme-btn2">{{$video->views}} | <i class="icofont icofont-eye">| Views</i></h4>
								</div>
							</div>
						</div>
					</div>

					@endif
					@endforeach
					@foreach($videos as $key=>$video)
					@if($key == 7)
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
							<a id="video"  href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> </a>
							@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2> {{$video->title}}</h2>
								
								<p>{!!($video->description)!!}</p>
							
								<div class="slide-trailor">
									<h3> Watch This Video Here</h3>
									<a class="theme-btn theme-btn1" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> Video</a>
								</div>
								<div class="">
									............................................................
								</div>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4 class="theme-btn theme-btn2">{{$video->views}} | <i class="icofont icofont-eye">| Views</i></h4>
								</div>
							</div>
						</div>
					</div>

					@endif
					@endforeach
					@foreach($videos as $key=>$video)
					@if($key >5 && $key < 7  )
					<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
							<div class="hero-area-content">
							<a id="video" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i></a>
							@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
							</div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2> {{$video->title}}</h2>
								
								<p>{!!($video->description)!!}</p>
								<div class="slide-trailor">
									<h3> Watch The Video Here </h3>
									<a class="theme-btn theme-btn1" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> Video</a>
								</div>
								<br>
								<div class="">
									............................................................
								</div>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4 class="theme-btn theme-btn2">{{$video->views}} | <i class="icofont icofont-eye">| Views</i></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			
				<div class="hero-area-thumb">
				    	@foreach($videos as $key=>$video)
				        @if($key == 7  )
					<div class="thumb-prev">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
										@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
								</div>
							</div>
							<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2>Video Title:{{$video->title}}</h2>
								<hr>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							<p>{!!($video->description)!!}</p>
								<div class="slide-trailor">
									<h3> Watch The Video Here </h3>
									<a class="theme-btn theme-btn2" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> Video</a>
								</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				@endforeach
				@foreach($videos as $key=>$video)
				@if($key >5 && $key < 7  )
					<div class="thumb-next">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
											@if($video->videolink == '' )
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
										@else
										@php
										$value = explode('=',$video->videolink);
               							$value = $value[1];
										@endphp							
										<img class="lazy" data-src="https://i.ytimg.com/vi/{{$value}}/sddefault.jpg" />										
										@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="hero-area-content pr-50">
								<h2>{{$video->title}}</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							<p>{!!($video->description)!!}</p>
								<div class="slide-trailor">
									<h3> Watch The Video Here </h3>
									<a class="theme-btn theme-btn2" href="{{url('videodetail')}}/{{$video->slug}}"><i class="icofont icofont-play"></i> Video</a>
								</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				@endforeach
				</div>
			</div>
		</section><!-- hero area end -->
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
						</div>
					</div>
					<div class="col-lg-6 text-center text-lg-right">
					    <div class="portfolio-menu">
							<ul>
								<li data-filter="*" class="active">Latest</li>
								<li data-filter=".soon">Comming Soon</li>
								<li data-filter=".top">Top Rated</li>
								<li data-filter=".released">Recently Released</li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
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
						<div  class="d-flex justify-content-center mt-10" style="">								
							<p>{!! $videos->links() !!}</p>	
							</div>
					</div>
					
				</div>
			</div>
		</section><!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-40">
			<div class="container">
					<div class="col-md-12">
					</div>
				</div>	
			</div>
		</section><!-- video section end -->
		<!-- news section start -->
		
        @endsection