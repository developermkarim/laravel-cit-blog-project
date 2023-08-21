@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

                       <!-- start page title -->
                       <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <a href="{{ route('admin_sidebar_ad_create') }}" class="btn btn-blue waves-effect waves-light">Add Sidebar Advertisements</a>
                                    </ol>
                                </div>
                                <h4 class="page-title">Sidebar Advertisements </h4>
                            </div>
                        </div>
                    </div>     


                      <!-- start page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>URL</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sidebar_ad_data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('upload/advertisements/'.$row->sidebar_ad) }}" alt="" style="width:200px;">
                                    </td>
                                    <td>{{ $row->sidebar_ad_url }}</td>
                                    <td>{{ $row->sidebar_ad_location }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_sidebar_ad_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_sidebar_ad_delete',$row->id) }}" id="DeleteBtn" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection