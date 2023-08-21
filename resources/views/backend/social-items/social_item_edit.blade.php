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
                                        <a href="{{ route('admin_social_item_create') }}" class="btn btn-blue waves-effect waves-light">Add Social Item</a>
                                    </ol>
                                </div>
                                <h4 class="page-title">Social Items </h4>
                            </div>
                        </div>
                    </div>     
                      <!-- start page title -->

    <form action="{{ route('admin_social_item_update',$social_item_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Icon Preview</label>
                            <div>
                                <i class="{{ $social_item_data->icon }}" style="font-size:30px;"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" class="form-control" name="icon" value="{{ $social_item_data->icon }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url" value="{{ $social_item_data->url }}">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
</div>
</div>
@endsection