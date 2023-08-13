<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



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
        // $adminRoles = User::select('role')->groupBy('role')->get();
        // dd($adminRoles);
        $roles = Role::all();
        return view('backend.admin.admin_add',compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
          $admin = new User();
       
          if($request->hasFile('photo')){
            $mainImage = $request->file('photo');
            // dd($mainImage);
            $optimizeImage = $request->username . '-' . rand(10,999) . '.' . $request->file('photo')->getClientOriginalExtension(); 
            Image::make($mainImage)->resize(450,function($contraint){$contraint->aspectRatio();})->save('upload/admin_images/' . $optimizeImage); 
            $save_url = 'upload/admin_images/'. $optimizeImage;
           }else{
            $save_url = 'upload/no_image.jpg';
           }

        $admin->photo = $save_url;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password); 
        
        $admin->role = 'Admin';

        //  $admin->status =  $request->roles == 'admin' ? 'active' : 'inactive';
        $admin->status = 'inactive';
        
        $admin->remember_token = Str::random(10);

        //  dd($admin);
        if($admin->save()){

            $request->roles ? $admin->assignRole($request->roles) :  false;
            

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
        $roles = Role::all();
        // dd($roles);
        return view('backend.admin.admin_edit',compact('admin','roles'));
    }

    public function updateAdmin(Request $request)
    {
        $admin = User::findOrFail($request->id);
        
        //  dd($admin);

       if($request->hasFile('photo')){
        @unlink($admin->photo);

        $mainImage = $request->file('photo');
        $optimizeImage = $request->username . '-' . rand(55,999) . '.' . $request->file('photo')->getClientOriginalExtension(); 
        Image::make($mainImage)->resize(450,function($contraint){$contraint->aspectRatio();})->save('upload/admin_images/' . $optimizeImage); 
        $save_url = 'upload/admin_images/' . $optimizeImage;
       }else{
        $save_url = $admin->photo;
       }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->photo =  $save_url;

        /* assign role */
        
       
         $admin->status = $request->roles == 'admin' ? 'active' : 'inactive';
        
        $admin->remember_token = Str::random(10);

        if($admin->save()){

            $admin->roles()->detach();
            $request->roles ? $admin->assignRole($request->roles) : false;

            $notification = [
                'message'=> "admin data is successfully Updated",
                'alert-type'=>'info' 
            ];
            return redirect('all/admin')->with($notification);
        }
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        if($admin->delete()){
            
            return redirect()->back()->with(['message'=>'an admin was deleted successfully','alert-type'=>'success']);
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

   /*  public function deactivate($id)
    {
        $data = User::findOrFail($id);
       $data->status = 'inactive';
       return response()->json(['success'=>'User Status changed deactivated','alert-type'=>'success','status'=>$data->status]);

    }
    public function activate($id)
    {
        $data = User::findOrFail($id);
       $data->status = 'active';
       $data->save();
        return response()->json(['success'=>'User Status changed activated','alert-type'=>'success','status'=>$data->status]);
       } */


    }


 