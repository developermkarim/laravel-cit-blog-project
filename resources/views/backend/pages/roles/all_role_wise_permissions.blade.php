@extends('admin.admin_dashboard')
@section('admin') 

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <a href="{{ route('add.roles') }}" class="btn btn-blue waves-effect waves-light">Add Roles</a>
                </ol>
            </div>
                                    <h4 class="page-title">Roles All </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
 

        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Roles Name </th> 
                    <th>Permissions </th> 
                    <th width="18%">Action </th> 
                </tr>
            </thead>
        
        @php
           
        @endphp
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>
                        {{ ++$key }}
                    </td>

                    <td>
                     
                         {{  $role->name  }}
                         
                       
                    </td> 

                   
                    
                    <td>
                        @foreach ($role->permissions as $permission)
                        <span class="badge rounded-pill bg-danger">    {{ $permission->name  }} </span>  
                            @endforeach
                    

                    </td>
                   

                    <td>
      <a href="{{ route('edit.roles.wise.permissions',$role->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

      <a id="DeleteBtn" href="{{ route('delete.roles.wise.permissions',$role->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>

                    </td> 
                </tr>
               
                @endforeach

            </tbody>
        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

@endsection



