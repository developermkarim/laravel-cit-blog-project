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
                    <a href="{{ route('add.admin') }}" class="btn btn-blue waves-effect waves-light">Add Admin</a>
                </ol>
            </div>
                                    <h4 class="page-title">Admin All </h4>
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
                    <th>Image </th>
                    <th>Name </th>
                    <th>Email </th>
                    <th>Phone </th>
                    <th> Role </th>
                    <th>Status </th> 
                    <th>Action </th> 
                </tr>
            </thead>


            <tbody>
            	@foreach($admins as $key=> $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ (!empty($item->photo)) ? url($item->photo): url('upload/no_image.jpg') }} " style="width:50px; height:50px;" ></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        @foreach ($item->roles as $role)
                            <span class="badge rounded-pill bg-purple-500">{{ $role->name }}</span>                            
                        @endforeach
                    </td>

                   
                    <td>
      @if($item->status == 'active')
      <span class="badge badge-pill bg-success">Active</span>
      

                        @else
    <span class="badge badge-soft-danger">Blocked</span>
                        @endif


                    </td> 
                    <td>
      <a href="{{ route('edit.admin',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

      <a href="{{ route('delete.admin',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="DeleteBtn">Delete</a>


      {{-- Status Change action Here --}}

      @if ($item->status == 'active')
      <a href="{{ url('admin/active/' . $item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" title="Inactive"><i class="fas fa-thumbs-up"></i> </a>

      <a href="" style="visibility: hidden" class="" title="Inactive"> {{-- <i class="fas fa-lock text-danger"></i> --}} inactive</a>


      @elseif($item->status == 'inactive')
      <a href="{{ url('admin/inactive/' . $item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" title="Active"><i class="fas fa-thumbs-down"></i> </a>
 
      @endif

    

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