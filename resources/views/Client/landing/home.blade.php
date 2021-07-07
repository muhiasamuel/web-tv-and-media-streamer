@extends('Client.landing.index')

@section('content')
		<!-- hero area start -->
		<section class="hero-area" style="background-image: url('{{asset('settings/bimg/'.$settings->backgroundimg)}}')" id="home">
			<div class="container">
				<div class="hero-area-slider">
				@foreach($videos as $key=>$video)
					@if($key == 1)
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
								<h2>Video Title: {{$video->title}}</h2>
								<hr>
								<p>{{$video->description}}</p>
							
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
					@if($key == 2)
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
								<h2>Video Title: {{$video->title}}</h2>
								<hr>
								<p>{{$video->description}}</p>
							
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
					@if($key == 3  )
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
								<h2>Video Title: {{$video->title}}</h2>
								<hr>
								<p>{{$video->description}}</p>
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
				@foreach($videos as $key=>$video)
				@if($key == 2  )
				<div class="hero-area-thumb">
					<div class="thumb-prev">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
								<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}"  alt="portfolio" />
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
								<p>{{$video->description}}</p>
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
				@if($key == 3  )
					<div class="thumb-next">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
								<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}"  alt="portfolio" />
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
								<p>{{$video->description}}</p>
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
										<img class="lazy" data-src="{{asset('videos/images/'.$video->image)}}" style="width: 250px; height: 150px;" alt="{{$video->title}}" />
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
										
										</a>
									
									</div>
									<div class="portfolio-content">
										<div class="review">
										<h6>{{$video->title}}</h6>
										<p>{{$video->views}} <i class="icofont icofont-eye"></i> views</p>
											
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
					
				</div>
			</div>
		</section><!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-90">
			<div class="container">
					<div class="col-md-12">
						<hr />
					</div>
				</div>	
			</div>
		</section><!-- video section end -->
		<!-- news section start -->
		
        @endsection