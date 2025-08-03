<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
            rel="stylesheet"    
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
            crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h4 class="mb-5 text-primary">Web Admin- Register</h4>
        
        <div class="card p-3 col-4">
            
            <form action="{{ route('registerSave') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input  value="{{ old('name') }}" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror"   
                            name="name">
                    <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input  value="{{ old('email') }}" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror"   
                            name="email">
                    <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input  value="{{ old('password') }}" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror"   
                            name="password">
                    <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input  value="{{ old('password_confirmation') }}" 
                            type="password" 
                            class="form-control @error('password_confirmation') is-invalid @enderror"   
                            name="password_confirmation">
                    <span class="text-danger"> @error('password_confirmation') {{$message}} @enderror </span>
                </div>
                <input type="hidden" name="age" value="20">
                <input type="hidden" name="city" value="CTG">
                <input type="hidden" name="profile_pic" value="assets/img/default.jpg	">
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>

        <a class="text-decoration-none mt-3 btn btn-primary" href="{{ route('home') }}">home</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous"></script>
</body>
</html>












