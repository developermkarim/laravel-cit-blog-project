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


    <form action="{{ route('admin_sidebar_ad_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Select Photo</label>
                            <div>
                                <input type="file" name="sidebar_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="sidebar_ad_url" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label>Location</label>
                            <select name="sidebar_ad_location" class="form-control">
                                <option value="Top">Top</option>
                                <option value="Bottom">Bottom</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div>
@endsection