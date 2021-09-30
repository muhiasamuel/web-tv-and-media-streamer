@extends('Client.landing.index')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
                    <div class="container">
						<div class="row"> 
						    <div class="col-lg-12">
								<div class="breadcrumb-area-content">									
									<h1>My Watchlist</h1>
								</div>
							</div>
						</div>				
					</div>
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
						<div class="d-flex justify-content-center" style="">								
								{!! $videos->links() !!}
							</div>
					</div>
    </div>
</div>


@endsection