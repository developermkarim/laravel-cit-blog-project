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
                                            
                                            <li class="breadcrumb-item active">Update Banner </li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Banner</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin_social_item_store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" class="form-control" name="icon">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" class="form-control" name="url">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                    
                    </div>
                </div>
            </div>
            
        </div>
        

</div>

</div>
</div>   
@endsection