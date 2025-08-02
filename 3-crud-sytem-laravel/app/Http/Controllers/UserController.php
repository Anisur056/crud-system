<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {// Must use `protected $guarded = [];` in Model file.
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required|string',
            'profile_pic' => 'mimes:jpg,png,jpeg,pdf|max:1000',
        ]);

        if($request->hasFile('profile_pic')){
            $Uploaded_file = $request->profile_pic;
            $upload_folder_path = 'assets/img/';
            $rename_file = $Uploaded_file->hashName();

            User::create(['profile_pic' => $upload_folder_path.$rename_file,]);
            $Uploaded_file->move($upload_folder_path, $rename_file);
        }

        $data_insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        
        // echo $fileName = $file->getClientOriginalName(); // get original file name.
        // echo $fileName = time().'_'.$file->getClientOriginalName(); // set time & (_) underscore with file name.
        // echo $fileName = $file->getClientOriginalExtension(); //get file extension.
        // echo $fileName = $file->extension(); //get file extension.
        // echo $fileName = $file->hashName(); //rename file name to hash name.
        // echo $fileName = $file->getClientMimeType(); //return file type.
        // echo $fileName = $file->getSize(); //return file size.
        
        if($data_insert){
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::find($user);
        return view('users-show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $data = User::find($user);
        return view('users-edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required|string',
            'profile_pic' => 'mimes:jpg,png,jpeg,pdf|max:1000',
        ]);

        //$user->name;
        
        // if file exists, then update new file path in database, move update file to public folder, delete old file.
        // if file doesn't update, then put old one.
        if($request->hasFile('profile_pic')){
            $Uploaded_file = $request->profile_pic;
            $upload_folder_path = 'assets/img/';
            $rename_file = $Uploaded_file->hashName();

            User::where('id',$user->id)->update(['profile_pic' => $upload_folder_path.$rename_file,]);

            $Uploaded_file->move($upload_folder_path, $rename_file);

            if(file_exists($user->profile_pic)){
                if($user->profile_pic === 'assets/img/default.jpg'){
                    //dont delete default image.
                }else{
                    @unlink($user->profile_pic);
                }
            }
        }

        $data_update = User::where('id',$user->id)
                ->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $data_delete = User::destroy($user->id);
        // $data_delete = User::truncate();

        if($data_delete){
            if(file_exists($user->profile_pic)){
                if($user->profile_pic === 'assets/img/default.jpg'){
                    //dont delete default image.
                }else{
                    @unlink($user->profile_pic);
                }
            }
            return redirect()->route('users.index');
        }
    }
}
