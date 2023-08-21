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
                                            
                                            <li class="breadcrumb-item active">Top Advertisements</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Top Advertisements</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


    <form action="{{ route('admin_top_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Top Ad Section</h5>                    
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('upload/advertisements/'.$top_ad_data->top_ad) }}" alt="" style="width:100%;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="top_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="top_ad_url" value="{{ $top_ad_data->top_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad_status" class="form-control">
                                <option value="Show" @if($top_ad_data->top_ad_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($top_ad_data->top_ad_status == 'Hide') selected @endif>Hide</option>
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
</div>
@endsection