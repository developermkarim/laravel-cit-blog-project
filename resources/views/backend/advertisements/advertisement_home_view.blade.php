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



    <form action="{{ route('admin_home_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Search</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('upload/advertisements/'.$home_ad_data->above_search_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_search_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_search_ad_url" value="{{ $home_ad_data->above_search_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_search_ad_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_search_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_search_ad_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Footer</h5>
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="above_footer_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="above_footer_ad_url" value="{{ $home_ad_data->above_footer_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_footer_ad_status" class="form-control">
                                <option value="Show" @if($home_ad_data->above_footer_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($home_ad_data->above_footer_ad_status == 'Hide') selected @endif>Hide</option>
                            </select>
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
@endsection