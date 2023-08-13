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
                                            
                                            <li class="breadcrumb-item active">Add Permission</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Permission</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
  
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         
    <form id="myForm" method="post" action="{{ route('permission.store') }}">
    	@csrf 

      {{--   @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        @endif --}}

         <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Permission Name </label>
                <input type="text" name="name" class="form-control @error('name') 'is-invalid' @enderror" id="inputEmail4" placeholder="Add Permission">

               
            </div>
            
        </div>
        @error('name')
        <div class="form-label alert alert-danger bg-white w-50 text-center">
           {{ $message }}
        </div>
    @enderror

    	
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Group Name </label>
                <select name="group_name" class="form-select"  id="example-select">
                    <option value=""> Select One Category </option>
                   
                    <option value="category">Category </option>
                    <option value="subCategory">SubCategory </option>
                    <option value="news">News  </option>
                    <option value="banner">Banner </option>
                    <option value="photo">Photo </option>
                    <option value="video">Video  </option>
                    <option value="live">Live  </option>
                    <option value="review">Review  </option>
                    <option value="seo">Seo  </option>
                    <option value="admin">Admin Setting  </option>
                    <option value="role">Role and Permission </option> 
                   
                </select>
             
            </div>
            
        </div>

        @error('group_name')
        <div class="form-label alert alert-danger bg-white w-50 text-center">
           {{ $message }}
        </div>
    @enderror
        
 
                                          

   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

 

@endsection 