<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{asset('assets/img/register-icon.png')}}">
</head>
<body>

<section class="vh-70">
  <div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h1><i class="fas fa-users-cog"></i></h1>
            <h3>Create an Account</h3>
            <form action="{{route('register')}}" method="post">
              @csrf
              <div class="form-group mb-2 text-start">
                <label for="name"><i class="fa-solid fa-file-signature"></i> Name</label>
                <input type="text" id="name" name="name" class="form-control form-control-lg @error('name')  is-invalid @enderror" />
                @error('name')
                <strong class="invalid-feedback">
                  {{$message}}
                </strong>
              @enderror
              </div>

              <div class="form-group mb-2 text-start">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                @error('email')
                <strong class="invalid-feedback">
                  {{$message}}
                </strong>
              @enderror
              </div>
             <div class="form-group mb-2 text-start">
                 <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                 <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                  @error('password')
                    <strong class="invalid-feedback" role="alert">
                       {{$message}}
                    </strong>
                 @enderror
              </div>
                <div class="form-group mb-2 text-start">
                  <label for="password_confirmation"><i class="fas fa-clipboard-check"></i> Confirm Password</label>
                  <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation">
                </div>

                <div class="form-group mb-2 text-start ms-3">
                    {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                </div>
                @if($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif

              <div class="text-center">
                 <button class="btn btn-primary btn-lg btn-block mt-3 w-100" type="submit">Register</button>
                 <hr>
                 <p class="text-center mt-2">Already have an account? <a href="{{route('login')}}" class="text-decoration-none">Login</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{!! NoCaptcha::renderJs() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
