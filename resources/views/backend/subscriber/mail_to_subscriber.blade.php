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
                                            
                                            <li class="breadcrumb-item active">Send Mail</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Send Mail To Subscribers</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
  
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         
    <form id="myForm" method="post" action="{{ route('mail.send') }}">
    	@csrf 
    	
        <div class="row">
         
             <div class="form-group col-md-6 mb-3">
                <label>Subject *</label>
                <input type="text" class="form-control" value="{{ old('subject') }}" name="subject">
            </div>



 <div class="col-12 mb-3">
     <label for="inputEmail4" class="form-label">Message</label>
            <textarea class="form-control"  value="{{ old('mailText') }}" name="mailText"></textarea>    
            </div>

             
        </div>
 
                                          

   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                                        </form>

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
                subject:{
                    required:true,
                },
                mailText: {
                    required : true,
                }, 
            },
            messages :{
                subject:{
                    required:"Sorry! Subject is blank",
                },
                mailText: {
                    required : 'Please Enter Message to Send Mail to Subscribers',
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