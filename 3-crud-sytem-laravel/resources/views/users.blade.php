<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
            rel="stylesheet"    
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add students</a>
        <div class="mt-3 mb-3">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pic</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Profile</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{ asset($user->profile_pic)}}" class="rounded-circle" style="width:50px;height:50px;"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->city}}</td>
                        <td><a href="{{ route('users.show',$user->id) }}" class="btn btn-primary">View</a></td>
                        <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">Update</a></td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr> 
                @endforeach
    
            </tbody>
        </table>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous"></script>
</body>
</html>