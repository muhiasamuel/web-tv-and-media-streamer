<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.7">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
    <h5>lo in</h5>
    <div class="col-md-6">
            <div class="card p-t-4">
            <div class="text-center logo">
						<a href="#"><img class="lazy" src="{{asset('settings/'.$settings->image)}}"style="width: 30%;" alt="logo" /></a>
					</div>
            <div class="text-center p-t-4 p-b-4">
            <h1 class="db1" ><strong>Unlimited Realityshows,Talkshows and more.</strong> </h1>
                        <h2 class="db" > {{ __('Register Now!') }}</h2>
                    </div>
    </nav>
  
    
    <div class="container1">

      <header>Signup Form</header>
      <div class="progress-bar1">
        <div class="step1">
          <p>Name</p>
          <div class="bullet1">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step1">
          <p>Contact</p>
          <div class="bullet1">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step1">
          <p>Birth</p>
          <div class="bullet1">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step1">
          <p>Submit</p>
          <div class="bullet1">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer1">
        <form action="#">
          <div class="page1 slide-page1">
            <div class="title">Basic Info:</div>
            <div class="field">
              <div class="label">First Name</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Last Name</div>
              <input type="text">
            </div>
            <div class="field">
              <button class="firstNext next">Next</button>
            </div>
          </div>

          <div class="page1">
            <div class="title">Contact Info:</div>
            <div class="field">
              <div class="label">Email Address</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Phone Number</div>
              <input type="Number">
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Previous</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page1">
            <div class="title">Date of Birth:</div>
            <div class="field">
              <div class="label">Date</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Gender</div>
              <select>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>

          <div class="page1">
            <div class="title">Login Details:</div>
            <div class="field">
              <div class="label">Username</div>
              <input type="text">
            </div>
            <div class="field">
              <div class="label">Password</div>
              <input type="password">
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>
              <button class="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="{{asset('js/script.js')}}"></script>

  </body>
</html>
