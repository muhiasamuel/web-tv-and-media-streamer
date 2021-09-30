@extends('Client.landing.index')

@section('content')
<!-- header section end -->
		<!-- breadcrumb area start -->
		
		<meta name="csrf-token" content="{{ csrf_token() }}" />
			<section class="breadcrumb-area" style = "
			background-image:linear-gradient(to left,rgba(0,0,0,0.85) 1%, rgba(0,0,0,0.68) 20%, rgba(0,0,0,0.5) 40%, rgba(0,0,0,0.35) 60% ,rgba(0,0,0,0.5) 80% ,rgba(0,0,0,0.85) 100%),
			url('{{asset('categories/'.$category->FeaturedImage)}}');">
			    <div class="cat-area">
					<div class="cat-description">
						
							 <div id="modal">
							 <p>{!! substr($category->description,0,50) !!}...
							 <a href="#"class="theme-btn theme-btn2" type="button" data-toggle="modal" data-target="#modacategoryDescription">Read More<i class="icofont icofont-double-right"></i> </a>	</p>
							</div>
						<!-- Modal -->
						<div class="modal-description">
							<div class="modal fade" id="modacategoryDescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="color:black">
							<div class="modal-dialog"  role="document">
								<div class="modal-content" id="modalaboutus">
								<div class="modal-header">
									<h4 class="modal-title" style="color:black" id="exampleModalLongTitle">{{$category->title}}</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" style="color:black">
								{!!($category->description) !!}
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>	
						</div>
					</div>
					<div class="container">
						<div class="row"> 
						<div class="col-lg-12">
								<div class="breadcrumb-area-content">
									
									<h1>{{$category->title}}</h1>
								</div>
							</div>
						</div>				
					</div>
				</div>
			</section>
		
		<!-- breadcrumb area end -->
		<!-- blog area start -->
		<section class="blog-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-coffee-cup"></i> {{$category->title}}</h1>
						</div>
					</div>
				</div>
				<hr />
                    @if(count($videos) > 0)
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
						<div class="d-flex justify-content-center mt-10" style="">								
								{!! $videos->links() !!}
							</div>
					</div>
    </div>
                    @endif
				
			</div>
		</section><!-- blog area end -->
		<!-- footer section start -->
		
		
	@endsection