<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Http\Requests\AdminStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{

    public function index()
    {
       /*  $props_count = Property::select()->count();
        $home_types_count = HomeType::select()->count();
        $adminsCount = Admin::select()->count(); */

        return view('admins.index');
    }
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Error logging in']);
        }
    }

    public function allUsers()
    {
        $allUsers = User::all();
        return view('admins.users', compact('allUsers'));
    }

    public function createUsers()
    {

        return view('admins.creatUser');
    }



    public function storeUsers(AdminStoreRequest $request)
    {
        $storeUsers = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($storeUsers) {
            return redirect()->route('users.display')->with('success', 'User added successfully');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users.display')->with('success', 'User deleted successfully');
        }

        return redirect()->route('users.display')->with('error', 'User not found');
    }


}
