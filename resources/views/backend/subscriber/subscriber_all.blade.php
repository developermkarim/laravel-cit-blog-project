@extends('admin.admin_dashboard')
@section('admin') 

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <a href="{{ route('mail.add') }}" class="btn btn-blue waves-effect waves-light">Mail To Subscribers</a>
                </ol>
            </div>
                                    <h4 class="page-title">Subscribers</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
 

        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Subscriber </th>
                  
                </tr>
            </thead>
        
        
            <tbody>
            	@foreach($subscribers as $key=> $subscriber)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $subscriber->email }}</td>

                </tr>
                @endforeach
                 
            </tbody>
        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

@endsection



