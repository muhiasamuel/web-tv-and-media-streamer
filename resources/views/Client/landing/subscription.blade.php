@extends('Client.landing.index')

@section('content')

<div class="container">
<section class="transformers-area">
			<div class="container">
          
				<div class="transformers-box">
					<div class="row flexbox-center">
						<div class="col-lg-5 text-lg-left text-center">
							<div class="transformers-content">
								<img type="image/png" src="assets\img\PngItem_349175.png" alt="My Subscription" />
							</div>
						</div>
						<div class="col-lg-7">
                        @if(Session::has('alert1'))
                            <div class="alert alert-success alert-dissmissable ">
                                <a href="#" class="close" data-dismiss="alert">&times;</a> 
                                {{ Session('alert1')}}
                            </div> 
                        @endif
						@if(Session::has('alert2'))
                            <div class="alert alert-success alert-dissmissable ">
                                <a href="#" class="close" data-dismiss="alert">&times;</a> 
                                {{ Session('alert2')}}
                            </div> 
                        @endif  
							<div class="transformers-content mtr-30">
								<h2> {{ Auth::user()->name }}.</h2>
								<a href="#" class="theme-btn">My Subscription</a>
								<a href="#">Edit</a>
								<ul>
									<li>
										<div class="transformers-left">
											Subscribed To:
										</div>
										<div class="transformers-right">
											{{$Userplan['name']}} Plan
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Interval: 
										</div>
										<div class="transformers-right">
                                            {{$Userplan['interval']}} Plan
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Subscription Status:
										</div>
										<div class="transformers-right">
											{{$Subscribed_user['status']}}
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Amount To Be Paid {{$Userplan['interval']}} : 
										</div>
										<div class="transformers-right">
                                        {{$Userplan['amount']}} {{$Userplan['currency']}}
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Paid Via:
										</div>
										<div class="transformers-right">
                                        {{ Auth::user()->card_brand }}
										</div>
									</li>
									
									<li>
										<div class="transformers-left">
											Actions:
										</div>
										<div class="transformers-right">
                                            @if($Subscribed_user['status'] == 'active')
                                            <form method="POST" action="{{ url('cancel',$Subscribed_user['id'])}}" id="paymentForm $subscribed_User['id']}}">
                                                {{ csrf_field() }}
                                                <button class="theme-btn theme-btn1 " type="submit">Cancel My Subscription</button>
                                            </form>     
                                                @else
                                            <form method="POST" action="{{ url('activate',$Subscribed_user['id'])}}" id="paymentForm $subscribed_User['id']}}">
                                                {{ csrf_field() }}    
                                                <button class="theme-btn theme-btn1 " type="submit">Actvate My Subscription</button>
                                            </form>
                                            @endif      
										</div>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
</div>


@endsection