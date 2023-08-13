{{-- 'roles','role','permissions','role_has_permissions_group' --}}

@extends('admin.admin_dashboard')
@section('admin')

<style>
    .form-check-label{
        text-transform: capitalize;
    }
</style>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                            <li class="breadcrumb-item active">Update Roles</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Roles</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
  
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         
    <form id="myForm" method="post" action="{{ route('update.roles.wise.permissions') }}">
    	@csrf 

        <input type="hidden" name="id" value="{{ $role->id }}">

         <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Roles Name </label>

                <select name="name" class="form-select" value="{{ old('name') }}" id="example-select">
                    <option value="">Select One Role</option>
                    @foreach ($roles as $one_role)

                    <option @selected($role->id==$one_role->id) value="{{ $one_role->id }}">{{ $one_role->name }}</option>

                    @endforeach

                </select>

                @error('name')
                <div class="alert alert-danger w-100 text-center bg-white m-1">{{ $message }}</div>
            @enderror
            </div>
            
        </div>


        <div class="form-check mb-2 form-check-primary">
            <input class="form-check-input"  type="checkbox"  id="customckeck15" >
            <label class="form-check-label" for="customckeck15">Permission All</label>
        </div>

      <hr> 

      @php
          $idkey = 0;
          $forkey=0;

        //   $permission_group = App\Models\User::GetPermissionGroup();
      @endphp

     
    @foreach ($role_has_permissions_group as $groupkey => $permissions_group_name)
      
         <div class="row">
            <div class="col-3">
                <div class="form-check mb-2 form-check-primary">

                    <input class="form-check-input group_name" @checked(App\Models\User::RoleHasPermisson($role,$permissions))  data-group-id="{{ $groupkey }}" type="checkbox" name="group_name"  id="customckeck{{ $idkey++ }}">
                    <label class="form-check-label" for="customckeck{{ $forkey++ }}">
                     
                          
                      {{ $permissions_group_name->group_name }}
                     
                    </label>

                </div>
                @error('group_name')
                <div class="alert alert-danger w-100 text-center bg-white m-1">{{ $message }}</div>
            @enderror
            </div>

           
            @php
                $group_wise_permissions = App\Models\User::GroupByPermissionName($permissions_group_name->group_name);
            @endphp

            
                
            <div class="col-9">

                @foreach ($group_wise_permissions as $namekey => $permissions)

                <div class="form-check mb-2 form-check-primary">
                    <input @checked($role->hasPermissionTo($permissions->name)) class="form-check-input permission_checkbox group_{{ $groupkey }}" name="permission[]" type="checkbox" value="{{ $permissions->id }}" id="customckeck{{ $permissions->id }}">
                    <label class="form-check-label" for="customckeck{{ $permissions->id }}">

                {{ $permissions->name }}

                    </label>

                </div>

                @endforeach

                <br>
                @error('permission')
                <div class="alert alert-danger w-100 text-center bg-white m-1">{{ $message }}</div>
            @enderror

            </div>
            
        </div>

        @endforeach
    

 
 
                                          

   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

</form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

 
                        
                    </div> <!-- container -->

                </div> <!-- content -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $('#customckeck15').on('click',function(){
       if ($(this).is(':checked')) {
           $('input[type = checkbox]').prop('checked',true);
       }else{
            $('input[type = checkbox]').prop('checked',false);
       }
    });

    $('.group_name').on('click',function(){
        var groupId = $(this).data('group-id');
        var permissionCheckBox = $('.permission_checkbox.group_' + groupId);
        permissionCheckBox.prop('checked',$(this).is(':checked'))
    })
  
    
});

    
</script>  

@endsection 