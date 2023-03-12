<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <title>Login</title>
    </head>
    <body style="background: linear-gradient(90deg, #EC2323, #8119D2);">
    <div class="d-flex justify-content-between p-5" style="position: absolute;">
        <a href="/" class="text-white" style="text-decoration: none;"><h3><i class="bi bi-arrow-left-square"></i> Back</h3></a>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100vh;">
        <div class="card py-3 px-5" style="width: 60%; box-shadow: 0 0 25px rgba(0, 0, 0, 0.29)">
        <!-- Session Status -->
        <x-auth-session-status class="alert alert-success mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger mb-4" :errors="$errors" />
            <h3 class="card-title text-center">Log in</h3>
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="mt-3 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="" required autofocus>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter your password" value="" required>
                        </div>
                        <!-- Remember Me -->
                        <div class="block mb-3">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="text-end mb-3">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 float-right" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                            <button class="btn btn-primary w-100 mt-3 mb-2" type="submit">Log in</button>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('register') }}">Don't have account? Register now!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
        
