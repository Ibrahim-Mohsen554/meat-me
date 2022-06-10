<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function __construct(){

            $this->middleware(['permission:read_users'])->only('index');
            $this->middleware(['permission:create_users'])->only('create');
            $this->middleware(['permission:update_users'])->only('edit');
            $this->middleware(['permission:delete_users'])->only('destroy');
        }

    public function index()
    {
        $users = User::whereRoleIs('admin')->get();
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
            // dd($request->all());

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
        return view('dashboard.users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_Name'=>'required',
            'last_Name'=>'required',
            'email'=>'required',


        ]);

        $request_date = $request->except(['permissions']);
        $user->syncPermissions($request->permissions);
        $user->update($request_date);
          session()->flash('success',__('site.updated_successfuly'));
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('success',__('site.deleted_successfuly'));
        return redirect()->route('dashboard.users.index');
    }
}
