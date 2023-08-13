<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function PermissionValidation($requestForm)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:permissions,name,' . $requestForm->id,
            'group_name'=>'required',
        ],[
            'name.required'=> 'permission name must be filled up',
            'name.unique'=>'The permission Name already Exist, Try with another name'
        ],
    );
    }
    public function RoleValidation($requestForm)
    {
      return   $requestForm->validate([
            'name'=>'required|unique:roles,name,' . $requestForm->id ,
            
        ],[
            'name.required'=> 'Role name must be filled up',
            'name.unique'=>'The Role Name already Exist, Try with another name'
        ],
    );
    }

    public function RoleWisePermissionValidation($formValidate)
    {
        $formValidate->validate([
            'name'=>'required|numeric',
            'permission'=>'required'
        ],
        [
            'name.required'=> 'Role name must be filled up',
            /* 'name.unique'=>'The Role Name already Exist, Try with another name', */
            'permission.required'=>'group Name Wise permissions can\'nt be empty'
        ],
    );

    
    }

    public function AllPermission()
    {
        $permissions = Permission::all();
       return view('backend.pages.permission.all_permission',compact('permissions'));
    }

    public function AddPermission()
    {
      
       return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
         $this->PermissionValidation($request);

        /* $request->validate([
            'name'=>'required',
            'group_name'=>'required',
        ],[
           // 'name.required'=> 'Permission name must be filled up',
            // 'group_name.required'=>'Please select one category',
        ]); */

        //  dd($request->all());

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.permission')->with($notification);  
       
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
       
       return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {
        $this->PermissionValidation($request);

       $permission_id = $request->id;

       $updatePermission = Permission::findOrFail($permission_id)->update([
        'name'=>$request->name,
        'group_name'=>$request->group_name,
       ]);

       if($updatePermission==1){

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.permission')->with($notification);  
       }
      
    }

    public function DeletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        if($permission->delete()){

            $notification = [
                'message'=>'YOur permission is deleted successfully',
                'alert-type'=> 'success',
            ];

            return redirect('all/permission')->with($notification);
        }
      
    }



       ///////////////// All Roles Method ////////////////



       public function AllRoles(){

        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));

    } // End Method 


    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }// End Method 
    public function StoreRoles (Request $request){

      $this->RoleValidation($request);
      
        $role = new Role();

        $role->name = $request->name;
        if($role->save()){
            $notification = array(
                'message' => 'Role Inserted Successfully',
                'alert-type' => 'success'
    
            );
            return redirect()->route('all.roles')->with($notification);  
        }

    }// End Method 

    public function EditRoles($id){

        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));

    }// End Method


    public function UpdateRoles(Request $request){

        $this->RoleValidation($request);

        $role_id = $request->id;

         Role::findOrFail($role_id)->update([
            'name' => $request->name, 
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.roles')->with($notification);  

    }// End Method

    public function DeleteRoles($id){

    Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);  

    }// End Method


    public function AllRolesPermission()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        // dd($roles->permissions);
        $role_has_permissions = User::GetGroupPermission(); /* Permission::select('group_name')->groupBy('group_name')->get(); */
        // dd($role_has_permissions);

        return view('backend.pages.roles.all_role_wise_permissions',compact('roles','role_has_permissions','permissions'));

    }

    public function AddRolesPermission()
    {
         $roles = Role::orderBy('name','ASC')->get();
         $permissions = Permission::orderBy('name','ASC')->get();
         $role_has_permissions_group = User::GetGroupPermission();
        //  dd($role_has_permissions_group);
         return view('backend.pages.roles.add_role_wise_permissions',compact('roles','permissions','role_has_permissions_group'));
    }

    public function StoreRolesPermission(Request $request)
    {
        $this->RoleWisePermissionValidation($request);

        $exist =  DB::table('role_has_permissions')->select('role_id')->where(['role_id'=>$request->name])->get();
        // dd($exist);
        if($exist == true){
            $notification = [
                'message'=> "Role name already exist, try another Role",
                 'alert-type'=> "error",
             ];
             
             return redirect()->route('all.roles.wise.permissions')->with($notification);
        }
        else{
       
        /*  $role = $request->name;
         $permissions = $request->permissions;
         
         foreach ($permissions as $key => $permission) {
          $roleHasePermission =  DB::table('role_has_permissions')->insert([
                'permission_id'=> $permission,
                'role_id'=> $role
            ]);
         } */
         $data = [];
         $permissions = $request->permission;

         $isSaved = false;

         foreach ($permissions as $key => $permission) {

            $data['role_id'] = $request->name;
            $data['permission_id'] = $permission;
             DB::table('role_has_permissions')->insert($data);
             $isSaved=true;
         }

         $notification = [
            'message'=> "Role Wise Multiple Permission added",
            'alert-type'=> "success",
         ];

        
        //  dd($roleHasePermission);

         if($isSaved==true){
            return redirect()->route('all.roles.wise.permissions')->with($notification);
         }

        }
         
    }

    public function EditRolesPermission($id){
        $roles = Role::all();
        $role = Role::findOrFail($id);
        // dd($roles->permissions);
        $permissions = Permission::all();
        $role_has_permissions_group = User::GetGroupPermission();
       //  dd($role_has_permissions_group);
        return view('backend.pages.roles.edit_role_wise_permissions',compact('roles','role','permissions','role_has_permissions_group'));

    }

    public function UpdateRolesPermission(Request $request)
    {
        $this->RoleWisePermissionValidation($request);

        $role_id = $request->id;
        $role = Role::findOrFail($role_id);
        $data=[];
        $isUpdated=false;
      $permissions = $request->permission;
        if(!empty($permissions)){
           $syncPermission = $role->syncPermissions($permissions);
        //    dd($syncPermission);
           if($syncPermission){
            $isUpdated=true;

          
         
           }else{
            $notification = [
                'message'=> "Role Wisee Permission Not Sync in Updated",
                'alert-type'=> "error",
             ];
           }
            
        }
       
        $notification = [
            'message'=> "Role Wise Multiple Permission Updated",
            'alert-type'=> "success",
         ];
   
   
   //  dd($roleHasePermission);

    if($isUpdated==true){
       return redirect()->route('all.roles.wise.permissions')->with($notification);
    }
        
    }

    public function DeleteRolesPermission($id)
{
       $isDeleted = false;
       $role = Role::findOrFail($id);
       if(!is_null($role)){
        $role->delete();
        $isDeleted=true;
       }

        $notification = [
            'message'=> "Role Wise  Permissions Deleted",
            'alert-type'=> "success",
         ];
   
   
   //  dd($roleHasePermission);

    if($isDeleted==true){
       return redirect()->back()->with($notification);
    }

    }
}
