<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
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

    public function allAdmins()
    {
        $allAdmins = Admin::all();
        return view('admins.admins', compact('allAdmins'));
    }

    public function createAdmins()
    {

        return view('admins.create');
    }



    public function storeAdmins(AdminStoreRequest $request)
    {
        $storeAdmins = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($storeAdmins) {
            return redirect()->route('admins.display')->with('success', 'Admin added successfully');
        }
    }

}
