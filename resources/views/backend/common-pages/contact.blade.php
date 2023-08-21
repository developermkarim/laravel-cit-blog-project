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
                                            
                                            <li class="breadcrumb-item active">Update contact Page</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update contact Page</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <form action="{{ route('update.contact') }}" method="POST">
                            @csrf
                        <div class="row">

                            <div class="col-12 mb-3">
                                <label for="inputEmail4" class="form-label">Title * </label>
                                <input type="text" name="contact_title" class="form-control"  value="{{ $contactText->contact_title }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="inputEmail4" class="form-label"> Details *</label>
                                       <textarea class="form-control" name="contact_details">
                                        {{ $contactText->contact_details }}
                                    </textarea>    
                          </div>

                            <div class="col-12 mb-3">
                                <label for="inputEmail4" class="form-label"> Contact Map *</label>
                                <input type="text" name="contact_map" class="form-control"  value=" {{ $contactText->contact_map }}">
                                       
                          </div>
                         
                            <div class="col-12 mb-3">
                                <label for="inputEmail4" class="form-label">Status  * </label>
                                    <br>




                                    <div class="d-flex flex-wrap">

                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="status" value="{{ true }}" id="inlineRadio1" @checked($contactText->contact_status=='1')>
                                            <label class="form-check-label" for="inlineRadio1">Show In Page</label>
                                        </div>

                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="status" value="0" id="inlineRadio2" @checked($contactText->contact_status=='1')>
                                            <label class="form-check-label" for="inlineRadio2">Hide In Page</label>
                                        </div>
                                      
                                    </div>

                                       {{--  <input class="form-cotrol" type="radio" @checked($contactText->contact_status=='1') name="status" value="{{ true }}" id="">Show
                                        <input class="form-cotrol" type="radio" @checked($contactText->contact_status =='0') value="{{ false }}" name="status" id="">Hide --}}
                                      
                         </div>
                           
                                       <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                        </div>
                  
                    </form>

                    </div>


</div>

<script>
     
</script>
  @endsection        