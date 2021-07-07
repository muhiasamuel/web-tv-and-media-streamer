@extends('layouts.app')

@section('content')
<div class="container">
    
    <style>
           .next.btn-primary{
            width:90%;
            height:3rem;
            margin-right:2rem;
            background-color:#ec5b08;
            border:none;
            font-size:1.5rem;
            font-weight:bold;
        }
        .previous.btn-primary{
            height:3rem;
            margin-right:2rem;
            background-color:#fc1b13;
            border:none;
        }
        .btn-primary[type=submit]{
            height:3rem;
            margin-right:2rem;
            background-color:#ec5b08;
            border:none;
        }
        .logo{
           
           background-color:rgba(0, 0, 0, 0.2);
           margin-top: 50px;
           
       }
    </style>
<div class="row justify-content-center">
        <div class="col-md-5">
        <div class="text-center logo">
						<a href="#"><img class="lazy" src="{{asset('settings/'.$settings->image)}}"style="width: 50%;" alt="logo" /></a>
					</div>
            <div class="card pt-0 mt-0" id="Login">
            
            <div class="text-center pt-4 pb-3">
            <h1 class="db1" ><strong></strong> </h1>
                        <h1 class="db" > {{ __('SIGN IN') }}</h1>
                    </div>
                    <hr>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group row mt-1 mb-1 ml-4 mr-4">                            
                                <div class="input-group-prepend  text-center">
                                    <span class="input-group-text bg-success " id="basic-addon1"><i class="fad fa-envelope"></i></span>
                                </div>                            
                                <input id="email1" type="email" style="width: 80%;" class="  form-control-lg @error('email') is-invalid @enderror" placeholder="email" aria-label="Email_Address" aria-describedby="basic-addon1" name="email" required  >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class=""></div>
                            <br>

                            <div class="input-group row mt-1 mb-4 ml-4 mr-4">                           
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success " id="basic-addon2"><i class="fas fa-lock"></i></span>
                                    </div>                            
                                    <input id="password" type="password" style="width: 80%;" class="form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                           
                            </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4 ml-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-navigation mt-4 ml-4 ">                                    
                                    <button type="submit" class="next btn btn-primary float-right"><i class="fal fa-chevron-circle-right"></i>
                                    {{ __('Login') }}
                                    </button>
                       </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 ml-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
