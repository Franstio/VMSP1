<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VMS</title>

  <link rel="stylesheet" href="{{asset ('css/style.css')}}">
</head>

<body>
  <div class="container">
    <div class="outer_form">
      <div class="left">
      <img src="/img/image1.jpg" class="image_left">
      </div>
      <div class="right">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="column text-right">
              <select class="mr-4">
                <option>Language</option>
                <option>INA</option>
                <option>EN</option>
              </select>
            </div>
            <div class="column">
              <div class="input_form">
                <h1>Enter Your Password Below</h1>
                <br>

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>  
                            </div>
                        </div>
                        <br>
                       
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">                               
                            </div>
                        </div>
                        <br>
                       
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-blue">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
