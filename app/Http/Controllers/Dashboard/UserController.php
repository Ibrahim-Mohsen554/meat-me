<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.users.create');
    }


    public function store(Request $request)
    {
            // dd($request->permissions );

        $request->validate([
            'first_Name'=>'required',
            'last_Name'=>'required',
            'email'=>'required|unique:Users',
            'password'=>'required|confirmed',

        ]);

        $request_date = $request->except(['password','password_confirmation','permissions']);
        $request_date['password'] = bcrypt($request->password);

        $user = User::create($request_date);

        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);




        session()->flash('success',__('site.added_successfuly'));
        return redirect()->route('dashboard.users.index');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit');
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
