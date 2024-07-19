<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> 

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VMS</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
  <div class="outer_form">
    <div class="left">
      <img src="/img/image.jpg" class="image_left">
      </div>
    <div class="right">
  <div class="content_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                <div class="column text-right">
                    <select class="mr-4">
                            <option>Language</option>
                            <option href="/loginINA">INA</option>
                            <option>EN</option>
                    </select>
                </div>

            <div class="column">
              <div class="input_form">
                <h1>Login to Dashboard</h1>
                <br>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input id="username" type="text" placeholder="Employee ID" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>                        
                        <br>
                        <br>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password" autofocus>
                                <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                           <div class="column mt-2">
                                <button type="submit" class="btn btn-blue" href="/home">
                                   Sign in
                                </button>
                                
                            </div>
                                          
                            
                                <div class="mt-2 text-left text-red">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Click Here To Reset Your Password') }}
                                        </a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                       </div>
                    </div>
                </div>
                <script>
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#password');

                togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // toggle the eye slash icon
                    this.classList.toggle('bi bi-eye');
                });
                                </script>
            </body>
        </html>
                

