<!DOCTYPE html>
<html lang="en">

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
        <img src="/img/image1.jpg" class="image_left">
      </div>
      <div class="right">
        <div class="content_form">
        <form method="POST" action="{{ route('password.email') }}">
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
                <h1>Masukkan email anda</h1>
                <br>
                 @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                   
                        <br>
                        <br>
                            <button type="submit" class="btn btn-blue">
                                    {{ __('Ajukan') }}
                            </button>
                </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>