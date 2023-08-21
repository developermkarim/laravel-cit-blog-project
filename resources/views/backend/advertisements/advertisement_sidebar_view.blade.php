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
                                            
                                            <li class="breadcrumb-item active">Home Advertisements</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Home Advertisements</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


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
                                        <a href="{{ route('admin_sidebar_ad_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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