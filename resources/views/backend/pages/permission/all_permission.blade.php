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
                    <a href="{{ route('add.permission') }}" class="btn btn-blue waves-effect waves-light">Add Permission</a>
                </ol>
            </div>
                                    <h4 class="page-title">Permission All </h4>
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
                    <th>Permission Name </th>
                    <th>Group Name </th>
                    <th>Action </th> 
                </tr>
            </thead>
        
        
            <tbody>
            	@foreach($permissions as $key=> $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                     <td>{{ $item->group_name }}</td>
                    <td>
      <a href="{{ route('edit.permission',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

      <form action="/delete/permission/{{ $item->id }}" method="post">
        @csrf
        @method('DELETE')

       {{--  <input type="hidden" name="deleteId" value="{{ $item->id }}"> --}}
      <input type="submit" class="btn btn-danger rounded-pill waves-effect waves-light delete_permission" id="delete" value="delete">
    </form>
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
{{-- Here Delete By ajax  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.delete_permission').on('click',function(e)=>{
        e.preventDefault();
        if(confirm('Are you Sure Want to Delete it')){
            $(e.target).closest('form').submit()
        }
    })
</script>

                @endsection



