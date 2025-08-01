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
        ]);

        $data_insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
        ]);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required|string',
        ]);
        $data_update = User::where('id',$id)
                ->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
        ]);
        if($data_update){
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $data_delete = User::destroy($user);
        // $data_delete = User::truncate();

        if($data_delete){
            return redirect()->route('users.index');
        }
    }
}
