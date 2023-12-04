<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">    
    <div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left" style="padding-top: 50px; padding-bottom: 50px;">
            <h1 class="auth-title" style="font-size: xxx-large;">Sign Up</h1>
            <p class="auth-subtitle mb-4" style="font-size: large;">Input your data to register to our website.</p>
            @if ($errors->any())
                <h1 class = "auth-title" style="font-size: large; color: red;">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </h1>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="name" placeholder="Name">
                    <div class="form-control-icon" style="padding-left: 13px;">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                    <div class="form-control-icon" style="padding-left: 13px;">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                    <div class="form-control-icon" style="padding-left: 13px;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600' style="font-size: large;">Already have an account? <a href="login" class="font-bold">Log
                        In</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
