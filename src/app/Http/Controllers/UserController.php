<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\User;
use  Auth;
use Carbon\Carbon;
use Cache;
class UserController extends Controller
{
    //
    public function profile (Request $request)
    {
    
  
        return view('home');
    }
    public function showlistUser( request $request)
    {

        $key= $request->search;
        $user =User::where('name','like','%'. $key .'%')->paginate(5);
        return view('auth.admin.user.list',['users'=>  $user]);
       
    }
    public function CreateUser(request $request)
    {
        return view('auth.admin.user.create');
    }

    public function storeUser(Request $request, user $user)
    {
        $user->name = $request->name;
        $user->email=  $request->email;
        $user->password= bcrypt($request->password); 
        $user->role_id = $request ->role_id;
        $user->save();
        $notification = array(
            'message' => 'Đã Thêm Thành Viên',
            'alert-type' => 'success'
        );
        return redirect()->route('ShowListUser')->with($notification);
    }
    public function EditUser(Request $request ,$id)
    {
        return view('auth.admin.user.edit',['user'=> User::find($id)]);

    }
    public function UpdateUser( Request $request, user $user , $id  )
    {
        $pw = $request->password;
        $user =  User::findOrFail($request->id);
            if (Hash::needsRehash($pw)) {
                $password = Hash::make($pw);
            }
            else{
                $password = $request->password;      
            }
                $user->password =  $password;
                $user->name = $request->name;
                $user->email=  $request->email;
                $user->role_id = $request ->role_id;
                $user->save();
                $notification = array(
                    'message' => 'Cập Nhật Thành Công',
                    'alert-type' => 'success'
                );
        return redirect()->route('ShowListUser')->with($notification);
    }
    public  function DeleteUser(Request $request)
    {

        $user =  User::findOrFail($request->id);
        $user->delete();
        $notification = array(
            'message' => 'Đã Xóa Thành Viên ',
            'alert-type' => 'success'
        );
        return redirect()->route('ShowListUser')->with($notification);
    }
    public function ChangePasswordUser (Request $request)
    {
        return view('auth.admin.user.changepassword');
    }
    public function storePassword (Request $request)
    {

         $NewPassword = $request->newpassword;
         $CurrentPassword =  $request->currentpassword;
         $confirmpassword = $request->confirmpassword;
         if($NewPassword  !==  $confirmpassword )
         {
            return redirect()->back()->with('error', 'Mật Khẩu không khớp');
         }
         if(Hash::check($CurrentPassword, Auth::user()->password))
         {
            $objuser = User::find(Auth::user()->id);
            $objuser->password = Hash::make($NewPassword);
            $objuser->save();
            return redirect()->back()->with('success', 'Đổi Mật Khẩu Thành công');
         }
         else
              return redirect()->back()->with('error', 'Sai Mật Khẩu');
        
    }
  
 
}
