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

    <div class="container mt-3 pt-3">
        <h2>Add Student Record</h2>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input  value="{{ old('name') }}" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror"   
                                name="name">
                        <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input  value="{{ old('email') }}" 
                                type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email">
                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input  value="{{ old('age') }}" 
                                type="number" 
                                class="form-control @error('age') is-invalid @enderror" 
                                name="age">
                        <span class="text-danger"> @error('age') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select name="city"
                                class="form-select">
                            <option>---select one---</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Feni">Feni</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Chowmuhani">Chowmuhani</option>
                            <option value="Maijdee">Maijdee</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Savar">Savar</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Kaliakair">Kaliakair</option>
                            <option value="Sreepur">Sreepur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Bhairab">Bhairab</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Tarabo">Tarabo</option>
                            <option value="Ghorashal">Ghorashal</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Jashore">Jashore</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Magura">Magura</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Netrakona">Netrakona</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Saidpur">Saidpur</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Profile Pic</label>
                        <input class="form-control" type="file" name="profile_pic">
                        <span class="text-danger"> @error('profile_pic') {{$message}} @enderror </span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
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












