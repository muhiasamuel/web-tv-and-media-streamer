<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Scripts -->
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
    <link href="{{ asset('css/plan.css') }}" rel="stylesheet">
<div id="generic_price_table">   
<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        <h1>Choose Your Subscription Plan</h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">
            
            <!--BLOCK ROW START-->
            <div class="row justify-content-center">
         
                
                @foreach($data as $key=>$plan)
              
                    
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
                      
                      <!--FEATURE LIST START-->
                      <form method="POST" action="{{ route('pay',$plan['id'])}}" id="paymentForm">
                         {{ csrf_field() }}
                      <div class="generic_feature_list">
                      <input name="phone" type="tel" placeholder="Phone number" />
                      </div>
                      <!--//FEATURE LIST END-->
                      
                      <!--BUTTON START-->
                      <div class="generic_price_btn clearfix justify-content-center">
                              <button type="submit" class="btn btn-success float-left"  value="Buy">
                                 Continue with this plan
                              </button>
                      </div>
                      
                    </form>
                      <!--//BUTTON END-->
                      
                  </div>
                  <!--//PRICE CONTENT END-->
                      
                </div>
          
              
                @endforeach 
            </div>  
            <!--//BLOCK ROW END-->
            
        </div>
    </section>             
  <footer>
      <a class="bottom_btn" href="#">&copy; MrSahar</a>
    </footer>
</div>