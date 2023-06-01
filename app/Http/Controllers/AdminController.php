<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class AdminController extends Controller
{
   public function AdminLogout(Request $request): RedirectResponse{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

   }
   //End AdminLogout method

   public function Profile(){
   	$id = Auth::user()->id;
   	$adminData=User::find($id);
   	return view('admin.admin_profile_view',compact('adminData'));

   }
   //End End AdminProfile method

   public function EditProfile(){
    $id = Auth::user()->id;
    $EditData=User::find($id);
    return view('admin.admin_profile_edit',compact('EditData'));

   }
   //End EditProfile Method


}
