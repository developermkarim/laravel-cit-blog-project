@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .tox-tinymce{
        height: 300px !important;
    }
</style>
<div class="content">


                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">

                               @if(isset($poll))
                                   
                              
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                            <li class="breadcrumb-item active">Edit Poll</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Poll</h4>
                                </div>

                                @else
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            
                                            <li class="breadcrumb-item active">Add Poll</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Poll</h4>
                                </div>

                                @endif

                            </div>
                        </div>     
                        <!-- end page title --> 
  
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

         
        @if (!isset($poll))
            
        
    <form id="myForm" method="post" action="{{ route('poll.store') }}">

    	@csrf 
    	
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Question *</label>
                            <br> 
                            <textarea id="title" name="title" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
 
                                          

   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

   </form>

   @else

{{-- This form  for Update --}}

   <form id="myForm" method="post" action="{{ route('poll.update') }}">

    @csrf 
    <input type="hidden" value="{{ $poll->id }}" name="poll_id">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="form-label"> Question * </label>
                        <br> 
                        <textarea id="title" name="title" class="form-control" cols="30" rows="2">{{ $poll->title }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

                                      

<button type="submit" class="btn btn-primary waves-effect waves-light">Update Changes</button>

</form>

   @endif

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

 
                        
                    </div> <!-- container -->





                </div> <!-- content -->

                <script type="text/javascript">
                    $(document).ready(function (){
                        $('#myForm').validate({
                            rules: {
                               title: {
                                    required : true,
                                }, 
                            },
                            messages :{
                                title: {
                                    required : 'Please Enter a Poll',
                                },
                            },
                            errorElement : 'span', 
                            errorPlacement: function (error,element) {
                                error.addClass('invalid-feedback');
                                element.closest('.form-group').append(error);
                            },
                            highlight : function(element, errorClass, validClass){
                                $(element).addClass('is-invalid');
                            },
                            unhighlight : function(element, errorClass, validClass){
                                $(element).removeClass('is-invalid');
                            },
                        });
                    });
                    
                </script>
                

    @endsection