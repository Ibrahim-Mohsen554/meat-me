<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



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
        $roles = Role::where('name', '!=', 'super_admin')->get();
       return view('dashboard.users.create',compact('roles'));
    }


    public function store(Request $request)
    {


        $request->validate([
            'first_Name'=>'required',
            'last_Name'=>'required',
            'email'=>'required|unique:Users',
            'password'=>'required|confirmed',


        ]);

    $request_date = $request->except(['password','password_confirmation','permissions','image']);
        $request_date['password'] = bcrypt($request->password);



        if($request->image){

            Image::make($request->image)
                     ->resize(100,null,function($constraint){
                          $constraint->aspectRatio();
            } )

            ->save(public_path(('uploads/user_images/' . $request->image->hashName())));

            $request_date['image'] = $request->image->hashName();
        }


        $user = User::create($request_date);
        $user->attachRole($request->role);
        $user->syncPermissions($request->permissions);



        session()->flash('success',__('site.added_successfuly'));
        return redirect()->route('dashboard.users.index');
    }


    public function edit(User $user)
    {
        //    return  dd($user->id);

        // $id = $user->id;


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
        $user->syncRoles([$request->role],$request->id);
        $user->update($request_date);
          session()->flash('success',__('site.updated_successfuly'));
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(User $user)
    {
        if($user->image != 'default.jpg'){
            Storage::disk('public_uploads')->delete('/user_images/'. $user->image);
        }

        $user->delete();
        session()->flash('success',__('site.deleted_successfuly'));
        return redirect()->route('dashboard.users.index');
    }
}
