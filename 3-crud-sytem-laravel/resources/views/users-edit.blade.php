<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
            rel="stylesheet"    
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
            crossorigin="anonymous">
</head>
<body>

    <div class="container mt-3 pt-3">
        <h2>Update Student Record</h2>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('users.update',$data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input  value="{{ $data->name }}" 
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"   
                                name="name">
                        <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input  value="{{ $data->email }}" 
                                type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email">
                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input  value="{{ $data->age }}" 
                                type="number" 
                                class="form-control @error('age') is-invalid @enderror" 
                                name="age">
                        <span class="text-danger"> @error('age') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input  value="{{ $data->city }}" 
                                type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                name="city">
                        <span class="text-danger"> @error('city') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <a href="{{ route('users.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous"></script>
</body>
</html>