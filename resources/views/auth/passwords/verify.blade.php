!DOCTYPE html>
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
        <img src="/img/image.jpg" class="image_left">
      </div>
      <div class="right">
        <div class="content_form">
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="column text-right">
              <select class="mr-4">
                <option>Language</option>
                <option>INA</option>
                <option>EN</option>
              </select>
            </div>
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},

            <div class="column">
              <div class="input_form">
                <h2>Your request has been submitted</h2>
                <p>we have sent a link to reset your password via email <br>
                  if it doesn't arrive soon, check your spam folder or</p>
                <div class="column mt-1 text-left text-blue">
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
          </form>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-blue" href="/register">Back to Sign-In</button>
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