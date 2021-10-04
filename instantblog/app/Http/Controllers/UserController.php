<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Image;
use App\User;
use App\Post;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::where('id', '!=', '1')
            ->orderBy('id', 'ASC')
            ->paginate(30);

        return view('posts.users', compact('users'));
    }
    

    public function edit($username)
    {
        $user = User::where('id', '!=', '1')->whereUsername($username)->firstOrFail();
        return view('posts.profileedit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $attributes = request(['name',  'username', 'avatar', 'email', 'password' , 'website' , 'facebook' ,
        'twitter', 'instagram', 'linkedin']);

        $this->validate(request(), [
            'name' => 'required|max:255',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'min:5',
            ],

            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'required|min:6|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
            $postimage = $request->file('avatar');
            $filename = time() . '.' . $postimage->getClientOriginalExtension();
            Image::make($postimage)->resize(100, 100)->save(public_path('/images/'. $filename));
            $attributes['avatar'] = $filename;
        } else {
            $attributes['avatar'] = $user->avatar ;
        }
            $attributes['password'] = bcrypt(request('password'));

            $user->update($attributes);
        
        session()->flash('message', 'User Updated!');

        return redirect('/users');
    }

    public function show($username)
    {
        $user = User::where('id', '!=', '1')->whereUsername($username)->firstOrFail();
        return view('posts.userdelete', compact('user'));
    }

    public function destroy($id)
    {
        //Delete single user
        $user = User::findOrFail($id);
        $user->posts()->delete();
        $user->delete();

        session()->flash('message', 'User Deleted!');
        return redirect('/users');
    }

    public function adminProfile()
    {
        $admin = User::where('id', 1)->first();
        return view('posts.profile', compact('admin'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $attributes = request(['name',  'username', 'avatar', 'email', 'password' , 'website' , 'facebook' ,
        'twitter', 'instagram', 'linkedin']);

        $this->validate(request(), [
            'name' => 'required|max:255',
            'username' => [
                'required',
                Rule::unique('users')->ignore($admin->id),
                'min:5',
            ],

            'email' => [
                'required',
                Rule::unique('users')->ignore($admin->id),
            ],
            'password' => 'required|min:6|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
            $postimage = $request->file('avatar');
            $filename = time() . '.' . $postimage->getClientOriginalExtension();
            Image::make($postimage)->resize(100, 100)->save(public_path('/images/'. $filename));
            $attributes['avatar'] = $filename;
        } else {
            $attributes['avatar'] = $admin->avatar ;
        }
            $attributes['password'] = bcrypt(request('password'));

            $admin->update($attributes);
        
        session()->flash('message', 'Admin Updated!');

        return redirect('/admin');
    }
}
