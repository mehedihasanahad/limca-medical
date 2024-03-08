<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.user-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.User::class],
            'role' => ['required','numeric'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        // $user->user_type = 2;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->has('medical_center_id')) {
            $user->medicals()->attach($request->medical_center_id);
        }

        return redirect()->back()->with('status', 'Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit-user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        // $user->role = $request->role;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
       
        if ($request->role == 1 && $user->role == 1) {
            if ($user->medicals[0]->id != $request->medical_center_id) {
                $user->medicals()->detach($user->medicals[0]->id);
                $user->medicals()->attach($request->medical_center_id);
            }
        } else {
            if (empty($user->medicals[0]) == false) {
                $user->medicals()->detach($user->medicals[0]->id);
            }
            if ($request->role == 1) {
                $user->medicals()->attach($request->medical_center_id);
            }
        }
        $user->role = $request->role;
        $user->save();
        

        return redirect()->back()->with('status', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status', 'Successfully Deleted!');
    }

    public function firtPath()
    {
        if (Auth::user()->role == 1) {
            $user =  User::find(Auth::user()->id);
            $id = $user->medicals[0]->id;
            return redirect("appointment-list/$id");
        }else{
            return view('admin.medical.medical-list');
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.user.update-profile',compact('user'));

    }

    public function updateUser(Request $request,$id){
        $user = User::find($id);

        $user->password = Hash::make($request->password);
        // dd($request->password);
        $user->save();
        return redirect()->back()->with('status', 'Successfully Updated!');
    }

    public function editAdmin($id)
    {
        $user = User::find($id);
        return view('admin.update-adminprofile',compact('user'));

    }

    public function updateAdmin(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        // dd($request->password);
        $user->save();
        return redirect()->back()->with('status', 'Successfully Updated!');
    }
}
