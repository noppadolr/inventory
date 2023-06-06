<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function AdminLogout(Request $request): RedirectResponse{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();
    $notification=array(
        'message'=>'User Logout Successfully',
        'alert-type'=>'success',
       );

    return redirect('/login')->with($notification);

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

   public function StoreProfile(Request $request){
    $id = Auth::user()->id;
    $data=User::find($id);
    $data->name = $request->name;
    $data->username=$request->username;
    $data->email=$request->email;
    if($request->file('profile_image'))
        {
            $file=$request->file('profile_image');
            @unlink(public_path('upload/admin_images/'.$data->profile_image));

            $filename=$id.$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image']=$filename;
        }
   $data->save();
   $notification=array(
    'message'=>'Admin Profile Updated Successfully',
    'alert-type'=>'success',
   );

   return \redirect()->route('admin.profile')->with($notification);

}//End StoreProfile Method

public function ChangePassword(){
    return view('admin.admin_change_password');
}
//End ChangePassword Method

public function UpdatePassword(Request $request){
    $validateData = $request->validate([
        'oldpassword' =>'required',
        'newpassword' =>'required',
        'confirm_password'=>'required|same:newpassword',
    ]);
    $hashPassword = Auth::User()->password;
    if(Hash::check($request->oldpassword,$hashPassword)){
        $users = User::find(Auth::if());
        $users->password=bcrypt($request->newpassword);
        $users->save();

        session()->flash('message','Password Updated successfully');
        return redirect()->back();
    }
    else{
        session()->flash('message','Old Password is not match');
        return redirect()->back();

    }


}
//End Update Password Method



}
