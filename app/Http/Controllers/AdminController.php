<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{ 

    /* 
    * This adminController custom developed for admin logout ,change Password ,Dashboard, profile and login page
    */
    public function AdminDashboard(){
        return view('admin.index');
    } // End Method 


    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'info'

        );

        return redirect('/admin/logout/page')->with($notification);

    } // End Method 

    public function AdminLogin(){

        return view('admin.admin_login');

    } // End Method 

    public function AdminLogoutPage(){
         return view('admin.admin_logout');
    } // End Method 



    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    } // End Method 


    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone; 

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    } // End Method 


    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } // End Method 
 
    public function AdminUpdatePassword(Request $request){

        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password 
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with('error', "Old Password Doesn't Match!!");
        }
        // Update the new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', "Password Change Successfully");

    } // End Method 

    public function allAdmin()
    {
        $admins = User::where(['role'=>'admin'])->latest()->get();
        // dd($admins);

        return view('backend.admin.admin_all',compact('admins'));
    }

    public function addAdmin()
    {
        $adminRoles = User::select('role')->groupBy('role')->get();
        // dd($adminRoles);
        return view('backend.admin.admin_add',compact('adminRoles'));
    }

    public function storeAdmin(Request $request)
    {
          $admin = new User();
       
            $mainImage = $request->image;
            //  dd($mainImage);
           /*  $optimizeImage = $request->username . '-' . uniqid() . '.' . 'png';
            Image::make($mainImage)->resize(450,null,function($contraint){$contraint->aspectRatio();})->save('upload/admin_images/' . $optimizeImage);
            
        $admin->photo = $optimizeImage; */
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password); 
        $admin->role = $request->roles;
       
         $admin->status = $request->roles == 'admin' ? 'active' : 'inactive';
        
        $admin->remember_token = Str::random(10);

        //  dd($admin);
        if($admin->save()){
            $notification = [
                'message'=> "New $request->roles is successfully regsitered",
                'alert-type'=>'info' 
            ];
            return redirect('all/admin')->with($notification);
        }
    }

    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);
        // dd($admin->role);
        $roles = User::select('role')->groupBy('role')->get();
        // dd($roles);
        return view('backend.admin.admin_edit',compact('admin','roles'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = User::findOrFail($request->id);
        

       
            $mainImage = $request->file('image');
           /*  $optimizeImage = $request->username . '-' . rand(1,55) . '.' . $mainImage->getClientOriginalExtension(); */
         /*    Image::make($mainImage)->resize(450,function($contraint){$contraint->aspectRatio();})->save('upload/admin_image/' . $optimizeImage); */
     
            //  dd($mainImage);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
       /*  $admin->password = Hash::make($request->password);  */
        $admin->role = $request->roles;
       
         $admin->status = $request->roles == 'admin' ? 'active' : 'inactive';
        
        $admin->remember_token = Str::random(10);

        // dd($admin);
        if($admin->save()){
            $notification = [
                'message'=> " $request->roles's data is successfully Updated",
                'alert-type'=>'info' 
            ];
            return redirect('all/admin')->with($notification);
        }
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        if($admin->delete()){

        }
    }

    public function activeInactive($status,$id)
    {
        if($status == 'active'){
           $action = User::where('id',$id)->update(['status'=>'inactive']);
        }elseif($status == 'inactive'){
            $action = User::where('id',$id)->update(['status'=>'active']);
        }
        if($action){
            $notification = [
                'message'=>'Status Changed Successfully',
                'alert-type'=>'info',
            ];
            return redirect('all/admin')->with($notification);
        }
    }

}
 