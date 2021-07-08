@extends('layouts.app')

@section('content')
<link href="{{ asset('css/plan.css') }}" rel="stylesheet">
<body>
<div id="generic_price_table">   
<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        
                        <h1>Choose Your Subscription Plan</h1>
                        <h5> No commitments. You can cancel your subscription any time.</h5>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">
            
            <!--BLOCK ROW START-->
            <div class="row justify-content-center">
         
                @if($data)
                @foreach($data as $plan)
              
                  @if($plan['status'] == 'active')  
                <div class="col-md-4">
                
                <!--PRICE CONTENT START-->
                  <div class="generic_content active clearfix">
                      
                      <!--HEAD PRICE DETAIL START-->
                      
                      <div class="generic_head_price clearfix">
                      
                          <!--HEAD CONTENT START-->
                          <div class="generic_head_content clearfix">
                          
                            <!--HEAD START-->
                              <div class="head_bg"></div>
                              <div class="head">
                              <span>{{$plan['name']}}</span>
                              </div>
                              <!--//HEAD END-->
                              
                          </div>
                          <!--//HEAD CONTENT END-->
                          
                          <!--PRICE START-->
                          <div class="generic_price_tag clearfix">  
                          <span class="price">
                                  <span class="sign">NRN</span>
                                  <span class="currency">{{$plan['amount']}}</span>
                                  <span class="cent">.00</span>
                                  <span class="month">/Month</span>
                              </span>
                          </div>
                          <!--//PRICE END-->
                          
                      </div>                            
                      <!--//HEAD PRICE DETAIL END-->
                     <div class="generic_feature_list">
                          <ul>
                              <li><span>24/7</span> TV Shows</li>
                                <li><span>HD</span> Videos</li>
                            </ul>
                        </div>
                      <!--FEATURE LIST START-->
                      <form method="POST" action="{{ route('pay',$plan['id'])}}" id="paymentForm {{$plan['id']}}">
                         {{ csrf_field() }}
                       
                      <div class="generic_feature_list form-group">
                      <input name="phone" type="number" placeholder="Phone number" required />
                      </div>
                      <!--//FEATURE LIST END-->
                      
                      <!--BUTTON START-->
                      <div class="generic_price_btn clearfix">
                              <button type="submit" class="btn btn-success"  value="Buy">
                                 Continue with this plan
                              </button>
                      </div>
                      
                    </form>
                      <!--//BUTTON END-->
                      
                  </div>
                  <!--//PRICE CONTENT END-->
                      
                </div>
          
                    @endif
                @endforeach 
                @else
                <h1>No Data Found</h1>
                @endif
            </div>  
            <!--//BLOCK ROW END-->
            
        </div>
    </section> 
</div> 
</body>

@endsection
