<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/img/login-icon.jpg') }}">
   <style>
     .divider:after,
      .divider:before {
      content: "";
       flex: 1;
       height: 1px;
     background: #eee;
   }
  </style>

</head>

<body>
    <section class="vh-40">
        <div class="container py-3">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-sm-8 col-lg-7 text-center">
               <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid ms-5" width="200px">
             </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                  <label class="form-label" for="email"><i class="fa-solid fa-envelope"></i> Email address</label>
                  <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror">
                   @error('email')
                    <strong class="invalid-feedback">
                      {{ $message }}
                    </strong>
                 @enderror
                </div>

                <div class="form-group mb-2">
                  <label class="form-label" for="password"><i class="fa-solid fa-lock"></i> Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                  @error('password')
                    <strong class="invalid-feedback">
                       {{ $message }}
                   </strong>
                 @enderror
                </div>

                <div class="form-group mb-2 ms-5">
                    {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif

                <div class="d-flex justify-content-around align-items-center">
                  <div class="form-check">
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked {{ old('remember') ? 'checked' : '' }} />
                  </div>
                </div>

                <div class="d-flex justify-content-around align-items-center mb-3">
                    @if(Route::has('password.request'))
                      <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>

                <div class="divider d-flex align-items-center my-2">
                   <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>

                  <a class="btn btn-success btn-lg mt-2 w-100 text-white" href="{{route('register')}}">
                  <i class= "fas fa-user-plus me-2"></i>Create an Acccount</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      {!! NoCaptcha::renderJs() !!}

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>


