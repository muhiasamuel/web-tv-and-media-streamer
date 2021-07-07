@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .parsley-errors-list{
            margin:2px 0 3px;
            padding:0;
            list-style-type:none;
            color:red;
        }
        .section{
            display:none;
        }
        .section.current{
            display:block;
        }
        .next.btn-primary{
            height:3rem;
            margin-right:1rem;
            background-color:#ec5b08;
            border:none;
            font-size:22px;
        }
        .previous.btn-primary{
            height:3rem;
            margin-right:1rem;
            background-color:#fc1b13;
            border:none;
            font-size:22px;
        }
        .btn-primary[type=submit]{
            height:3rem;
            margin-right:1rem;
            background-color:#ec5b08;
            border:none;
            font-size:22px;

        }
        .logo{
           
            background-color:rgba(0, 0, 0, 0.5);
            margin-top: 100px;
            
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="text-center logo">
        <a href="#"><img class="lazy" src="{{asset('settings/'.$settings->image)}}"style="width: 40%;" alt="logo" /></a>
                </div>
            <div class="card pt-0 mt-0 " id="Login">
           
                <div class="card-body">
                    <form method="POST" class="reg-form" action="{{ route('register') }}">
                        @csrf
                        <div class="section">
                   
                <div class="text-center pb-4 " >
                <h4 > Step 1</h4>
                <h1 class="db1" ><strong>Unlimited Realityshows,Talkshows and more.</strong> </h1>
                        <h4 class="db" > {{ __('Register Now!') }}</h4>

                </div>
                            <div class="input-group row mb-3 mt-4 ml-4">                            
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success " id="basic-addon1"><i class="fad fa-envelope"></i></span>
                                </div>                            
                                <input id="email" type="email" style="width: 80%;"class=" form-control-lg @error('email') is-invalid @enderror" placeholder=" Enter Your Email" aria-label="Email_Address" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}"required  >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="section">
                        <div class="text-center pb-4">
                        <h4 > Step 2</h4>
                <h1 class="db1" ><strong>Account Details.</strong> </h1>
                </div>
                            <div class="input-group row mb-3  ml-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success " id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                                </div>                            
                                    <input id="username" type="text" style="width: 80%;" class=" form-control-lg @error('name') is-invalid @enderror" placeholder="Username" aria-label="username" aria-describedby="basic-addon1" name="name" value="{{ old('name') }}" required >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                                    <div class="input-group row mb-3 ml-4">                           
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                    </div>                            
                                    <input id="password" type="password" style="width: 80%;" class=" form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                           
                            </div>
                            <div class="input-group row mb-3  ml-4">                           
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info" id="basic-addon2"><i class="fal fa-unlock-alt"></i></span>
                            </div>                   
                            <input id="password-confirm" type="password" style="width: 80%;" class=" form-control-lg" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1" name="password_confirmation" required >                      
                            </div>
                       </div>
                       <div class="form-navigation mt-4">
                                <button type="button" class="previous btn btn-primary float-left"><i class="fal fa-chevron-circle-left"></i>
                                        {{ __('Go Back') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-back"></i><i class="fal fa-chevron-circle-right"></i>
                                        {{ __('continue') }}
                                    </button>
                                    <button type="button" class="next btn btn-primary float-right"><i class="fal fa-chevron-circle-right"></i>
                                        {{ __('Next') }}
                                    </button>
                       </div>                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        var $sections = $('.section');

    function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index > 0);
        var AtTheEnd = index >= $sections.length -1;
        $('.form-navigation .next').toggle(!AtTheEnd);
        $('.form-navigation [type=submit]').toggle(AtTheEnd);
    }
    function curIndex(){
        return $sections.index($sections.filter('.current'));
    }
   

$('.form-navigation .previous').click(function(){
    navigateTo(curIndex()-1);
});
$('.form-navigation .next').click(function(){
    $('.reg-form').parsley().whenValidate({
        group: 'block-' + curIndex()
    }).done(function(){
        navigateTo(curIndex()+1);
    });
});
$sections.each(function(index, section){
    $(section).find(':input').attr('data-parsley-group', 'block-' +index);
});
navigateTo(0);
   
   
</script>
@endsection
