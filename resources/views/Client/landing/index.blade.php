<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>STREETCEOSTV-LIVETV</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="{{ asset('assets/img/FAVICON LOGO.png') }}"/>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!--	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">-->
		<!-- Slick nav CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css" integrity="sha512-heyoieAHmpAL3BdaQMsbIOhVvGb4+pl4aGCZqWzX/f1BChRArrBy/XUZDHW9WVi5p6pf92pX4yjkfmdaIYa2QQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!--<link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet" media="all" />-->
		<!-- Iconfont CSS -->
		<link href="{{ asset('assets/css/icofont.css') }}" rel="stylesheet" media="all" />
		<!-- Owl carousel CSS -->
		<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" integrity="sha512-RWhcC19d8A3vE7kpXq6Ze4GcPfGe3DQWuenhXAbcGiZOaqGojLtWwit1eeM9jLGHFv8hnwpX3blJKGjTsf2HxQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
		<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
		<!-- Popup CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.css" integrity="sha512-4a1cMhe/aUH16AEYAveWIJFFyebDjy5LQXr/J/08dc0btKQynlrwcmLrij0Hje8EWF6ToHCEAllhvGYaZqm+OA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!--<link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">-->
		<!-- Main style CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" media="all">
		<!-- Responsive CSS -->
		<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" media="all">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<header class="header">
			<div class="container">
				<div class="header-area">
					<div class="logo">
						<a href="#"><img class="lazy" data-src="{{asset('settings/'.$settings->image)}}"style="width: 100%;" alt="logo" /></a>
					</div>
					<div class="header-right">
						<form >
							@csrf
							<input type="search" id="search_content" placeholder="Search Videos" />
						    <button><i class="icofont icofont-search"></i></button>							
						</form>                     
						<ul>
						@can('manageContent')                          
                          	<a href="{{ url('/home') }}" class="theme-btn" style="margin-left:2rem">Admin</a>                          
						@endcan
						</ul>					
					
					</div>
					<div class="menu-area">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
                            <ul id="primary-menu">
                            
                                <li><a  href="{{url('/')}}" class="text-uppercase">HOME</a></li>
								<li class="theme-btn theme-btn1" ><a href="{{url('watchlist')}}">Our TV</a></li>
                                @foreach($categories as $category)
                                <li><a href="{{url('categories')}}/{{$category->slug}}" class="text-uppercase">{{$category->title}}</a></li>
                                @endforeach
									
                                
								<li><a href="#"  class="text-uppercase">Pages <i class="icofont icofont-simple-down"></i></a>
									<ul id="dropdown">
									@foreach($pages as $page)
									<li><a href="{{url('pagedetail')}}/{{$page->slug}}" class="text-uppercase">{{$page->title}}</a></li>
									@endforeach
									</ul>
								</li>
								<li><a href="#"  class="text-uppercase">{{ Auth::user()->name }} <i class="icofont icofont-simple-down"></i></a>
									<ul  class="text-uppercase" id="dropdown">
									
										<li><a class="theme" href="#"> My Account</a></li>
										<li><a href="{{url('watchlist')}}">Watchlist</a></li>
										<li><a href="#">Collections</a></li>
										<li><a href="{{url('viewMySubscription')}}">My Subscription</a></li>
										<li>
												<a  href="{{ route('logout') }}"
											onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">
													{{ __('Logout') }}
												
												</a>
											</li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									
									</ul>
								</li>
                            </ul>
					    </div>
					</div>
				</div>
			</div>
			
			<div id="search_output"></div>
		</header>
		<div class="buy-ticket">
			<div class="container">
				<div class="buy-ticket-area">
					<a href="#"><i class="icofont icofont-close"></i></a>
					<div class="row">
						<div class="col-lg-8">
							<div class="buy-ticket-box">
								<h4>My Account</h4>
								<h5>{{Auth::user()->name }}</h5>
								<h6>My profile</h6>
								
								<div class="ticket-box-table">
									<table class="ticket-table-seat">
									<img type="image/png" src="{{ asset('assets/img/PngItem_349175.png') }}" class="mt-20" style="width:40%"alt="My Subscription" />
										<tr>
											<td>1</td>
											<td>2</td>
											<td>3</td>
											<td>4</td>
											<td>4</td>
											<td>6</td>
											<td>7</td>
										</tr>
										<tr>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
											<td class="active">1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
										<tr>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
										</tr>
									</table>
								</div>
								<div class="ticket-box-available">
									<input type="checkbox" checked />
									<span>Active</span>
								</div>
								<a href="#" class="theme-btn">cancel</a>
								<a href="#" class="theme-btn">ok</a>
							</div>
						</div>
						<div class="col-lg-3 offset-lg-1">
							<div class="buy-ticket-box mtr-30">
								<h4>Your Information</h4>
								<ul>
									<li>
										<p>Name</p>
										<span>{{Auth::user()->name }}</span>
									</li>
									<li>
										<p>Email</p>
										<span>{{Auth::user()->email }}</span>
									</li>
									<li>
										<p>Account Status</p>
										<span>Active</span>
									</li>
									<li>
										<p>Subscription Status</p>
										<span>{{Auth::user()->status }}</span>
									</li>
									<li>
										<p>Price</p>
										<span>89$</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
				@if(Session::has('alert'))
                    <div class="alert alert-success alert-dissmissable fade-out">
                        <a href="#" class="close" data-dismiss="alert">&times;</a> 
                        {{ Session('alert')}}
                    </div> 
                @endif 
				@if(Session::has('alert2'))
                    <div class="alert alert-success alert-dissmissable fade-out">
                        <a href="#" class="close" data-dismiss="alert">&times;</a> 
                        {{ Session('alert2')}}
                    </div> 
                @endif	
				@if(Session::has('message'))
							<div class="alert alert-success alert-dissmissable fade-in">
								<a href="#" class="close" data-dismiss="alert">&times;</a> 
								{{ Session('message')}}
							</div> 
							@endif 		
		
       @yield('content')
		<!-- footer section start -->
		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title mt-30 pb-20">
							<h1><i class="icofont icofont-coffee-cup"></i>Ads</h1>
						</div>
					</div>
				</div>
				<hr />
			</div>
			<div class="news-slide-area">
				<div class="news-slider">					
						@if(!empty($ads))
						@foreach($ads as $ad)
						<div class="single-advert">
							<div class="single-portfolio-advert mt-30">															
									<a href="{{$ad->url}}"><img class="lazy" data-src="{{asset('adverts/images/'.$ad->image)}}" alt="{{$ad->title}}" />
									<div class="news-date">
										<p>{{$ad->title}}</p>
									</div>
									</a>	
							</div>
						</div>	
						@endforeach	
						@else
						<p></p>
						@endif
				</div>
			</div>
		</section>
		<footer class="footer">
			<div class="container">
				<div class="row">
			
                    <div class="col-lg-4 col-sm-6">
						<div class="widget">
						<h4><span>Our Contacts</span></h4>
								<div id="modal">
								<a href="#" class="theme-btn theme-btn2" type="button" data-toggle="modal" data-target="#Contactsmodal">
								Contact us
								</a>
							</div>
						<!-- Modal -->
						<div class="modal-description">
							<div class="modal fade" id="Contactsmodal" tabindex="-1" role="dialog" aria-labelledby="ContactsmodalTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content" id="modalaboutus">
								<div class="modal-header">
									<h4 class="modal-title" style="color:black" id="ContactsmodalTitle">Contact Us </h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
							        <p>{!!($settings->adress)!!}</p>
							        <br>
							        {{$settings->contact}}
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>	
						</div>
							<h5>OR</h5>
						
							<div id="modal">
								<a href="#" class="theme-btn theme-btn1" type="button" data-toggle="modal" data-target="#smsmodal">
								Send Us a Message
								</a>
							</div>
							
						<!-- Modal -->
						<div class="modal-description">
							<div class="modal fade" id="smsmodal" tabindex="-1" role="dialog" aria-labelledby="smsModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" style="color:blacks" id="smsModalLongTitle">Send a Message:</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form method="post" action="{{url('addmessages')}}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="tbl" value="{{encrypt('messages')}}">
			
									<div class="row">
										<div class="col-lg-4 ">
											<div class="select-container form-group">
												<input type="text"name="name" placeholder="Name" required/>
												<i class="icofont icofont-ui-user"></i>
											</div>
										</div>
										<div class="col-lg-4 ">
											<div class="select-container form-group">
												<input type="text" name="email" placeholder="Email" required/>
												<i class="icofont icofont-envelope"></i>
											</div>
										</div>
										<div class="col-lg-4 ">
											<div class="select-container form-group">
												<input type="text" name="phone" placeholder="Phone" required/>
												<i class="icofont icofont-phone"></i>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="textarea-container form-group">
												<textarea name="message" placeholder="Type Here Message" required></textarea>
												<button><i class="icofont icofont-send-mail"></i></button>
											</div>
										</div>
									</div>
								</form>
									<p></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>	
						</div>
							 <div id="modal">
							 <h6><span>About Us:</h6>
							<p>{!! substr($settings->about,0,70) !!}...
							 <a href="#"class="theme-btn theme-btn1" type="button" data-toggle="modal" data-target="#modalabout">Read More<i class="icofont icofont-double-right"></i> </a>	</p>
							</div>
						<!-- Modal -->
						<div class="modal-description">
							<div class="modal fade" id="modalabout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog"  role="document">
								<div class="modal-content" id="modalaboutus">
								<div class="modal-header">
									<h4 class="modal-title" style="color:blacks" id="exampleModalLongTitle">About Us:</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								{!!($settings->about) !!}
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>	
						</div>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Legal</h4>
							<ul>
								@foreach($pages as $page)
									<li><a href="{{url('pagedetail')}}/{{$page->slug}}" class="text-uppercase">{{$page->title}}</a></li>
								@endforeach
							</ul>
						</div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
						<div class="widget">
							<h4>Account</h4>
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Watchlist</a></li>
								<li><a href="#">Collections</a></li>
								<li><a href="#">User Guide</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter system now to get latest news from us.</p>
							<form action="#">
								<input type="text" placeholder="Enter your email.."/>
								<button>SUBSCRIBE NOW</button>
							</form>
						</div>
                    </div>
					
                    </div>
					<div id="social-icons">
						<div class="text-right">
							<ul class="social-icons">
							@foreach($settings->social as $key=>$social)
								<li><a target="_blank" href="{{$social}}"><i class="icofont icofont-social-{{$icons[$key]}}" ></i></a></li>
							@endforeach	
							</ul>
						</div>
						</div>
				</div>
				
				<hr />
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 text-center text-lg-left">
							<div class="copyright-content">
								<div class="logo">
									<a target="_blank" href="https://streetceostv.com/"><img class="lazy" data-src="{{asset('settings/'.$settings->image)}}"style="width: 30%;" alt="logo" /></a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 text-center text-lg-right">
							<div class="copyright-content">
								<a href="#" class="scrollToTop">
									Back to top<i class="icofont icofont-arrow-up"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<style>

			</style>
		</footer><!-- footer section end -->
		<!-- jquery main JS -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<!--<script src="{{asset('assets/js/jquery.min.js')}}"></script>-->
		<!-- Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!--<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>-->
		<!-- Slick nav JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js" integrity="sha512-FmCXNJaXWw1fc3G8zO3WdwR2N23YTWDFDTM3uretxVIbZ7lvnjHkciW4zy6JGvnrgjkcNEk8UNtdGTLs2GExAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!--<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>-->
		<!-- owl carousel JS -->
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<!-- Popup JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.js" integrity="sha512-/jeu5pizOsnKAR+vn28EbhN5jDSPTTfRzlHZh8qSqB77ckQd3cOyzCG9zo20+O7ZOywiguSe+0ud+8HQMgHH9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!--<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>-->
		<!-- Isotope JS -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.2/isotope.pkgd.min.js"></script>
		<!--<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>-->
		<!-- main JS -->
		<script src="{{asset('assets/js/main.js')}}"></script>
		<script>
			$('#search_content').keyup(function(){
				var text = $('#search_content').val();
				if (text.length < 1) {
					$('#search_output').hide();
					return false
				}else{
					$.ajax({
						type:"get",
						url:"{{url('search_content')}}",
						data:{text:text},
						success:function(res){
							$('#search_output').show();
							$('#search_output').html(res);
						}
					})
				}
			})
		</script>
			
		<script>
			document.addEventListener("DOMContentLoaded", function() {
			var lazyloadImages;    

			if ("IntersectionObserver" in window) {
				lazyloadImages = document.querySelectorAll(".lazy");
				var imageObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
					var image = entry.target;
					image.src = image.dataset.src;
					image.classList.remove("lazy");
					imageObserver.unobserve(image);
					}
				});
				});

				lazyloadImages.forEach(function(image) {
				imageObserver.observe(image);
				});
			} else {  
				var lazyloadThrottleTimeout;
				lazyloadImages = document.querySelectorAll(".lazy");
				
				function lazyload () {
				if(lazyloadThrottleTimeout) {
					clearTimeout(lazyloadThrottleTimeout);
				}    

				lazyloadThrottleTimeout = setTimeout(function() {
					var scrollTop = window.pageYOffset;
					lazyloadImages.forEach(function(img) {
						if(img.offsetTop < (window.innerHeight + scrollTop)) {
						img.src = img.dataset.src;
						img.classList.remove('lazy');
						}
					});
					if(lazyloadImages.length == 0) { 
					document.removeEventListener("scroll", lazyload);
					window.removeEventListener("resize", lazyload);
					window.removeEventListener("orientationChange", lazyload);
					}
				}, 20);
				}

				document.addEventListener("scroll", lazyload);
				window.addEventListener("resize", lazyload);
				window.addEventListener("orientationChange", lazyload);
			}
			})	
		</script>
	</body>

</html>