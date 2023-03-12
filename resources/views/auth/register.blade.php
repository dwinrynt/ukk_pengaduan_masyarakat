{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already have account? Login now!') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
<!doctype html>
<html lang="en">
          <head>
            <!--  meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            {{-- Boostrap Icon --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
            <title>Register</title>
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
                    <h3 class="card-title text-center">Register</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Name -->
                                <div class="mt-3 mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value=""  autofocus>
                                </div>
                                <div class="row">
                                    <!-- NIK -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="number" class="form-control" name="nik" id="nik" placeholder="Enter your NIK" value="" >
                                    </div>
                                    <!-- Telp -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="telp" class="form-label">Nomor Handphone</label>
                                        <input type="number" class="form-control" name="telp" id="telp" placeholder="Enter your number phone" value="" >
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Email Address -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="" >
                                    </div>
                                    <!-- Jenis Kelamin -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="laki laki">Laki Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Password -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" value="" >
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="col-lg-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" value="" >
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button class="btn btn-primary w-100 mt-3" type="submit">Register</button>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('login') }}">Already have account? Log in now!</a>
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
        

