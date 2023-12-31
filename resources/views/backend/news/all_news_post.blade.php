@extends('admin.admin_dashboard')
@section('admin') 

 <div class="content">

    @php
        $activeNews = App\Models\NewsPost::where(['status'=>1])->count();
        $inactiveNews = App\Models\NewsPost::where(['status'=>0])->count();
        $breakingNews = App\Models\NewsPost::where(['breaking_news'=>1])->count();
        
    @endphp
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <a href="{{ route('add.news.post') }}" class="btn btn-blue waves-effect waves-light">Add News Post</a>
                </ol>
            </div>
   
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <br>

                        {{-- Count of active inactive and Breaking News Start --}}

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-heart font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"> <span data-plugin="counterup">{{count($allnews)  }}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">All News Post</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-thumbs-up font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $activeNews }}</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Active News</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-thumbs-down font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $inactiveNews }}</span> </h3>
                                                    <p class="text-muted mb-1 text-truncate">InActive News</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $breakingNews }}</span> </h3>
                                                    <p class="text-muted mb-1 text-truncate">Breaking News</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        {{-- Count of active inactive and Breaking News End --}}

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
 

        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    {{-- <th>Sl</th> --}}
                    <th>SL &nbsp; &nbsp; Image </th>
                    <th>Title </th>
                    <th>Category &nbsp; &nbsp; User </th>
                    <th>Date </th>
                    <th>Tags </th>
                    <th>Status </th> 
                    <th>Action </th> 
                </tr>
            </thead>
        
        <?php
        $categories = App\Models\Category::all();
        ?>
            <tbody>
            	@foreach($allnews as $key=> $item)
                <tr>
                    {{-- <td>{{ $key+1 }}</td> --}}
                    <td> {{ $key+1 }} &nbsp; &nbsp;
                         <img src="{{ asset($item->image) }} " style="width:50px; height:50px;" ></td>

                    <td>{{ Str::limit($item->news_title,25, '...') }}</td>
                    <td>{{ $item->category->category_name   }} &nbsp;
                        {{ $item->user->username }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        @php
                           $tags =  $item->tags()->pluck('name')->toArray();
                          
                        @endphp
                        @if($item->tags()!= null)
                    @foreach ($tags as $tag)
                        <span class="badge fill-round bg-primary">{{ $tag }}</span>
                    @endforeach
                    @endif
                    </td>
                    <td>
      @if($item->status == 1)
      <span class="badge badge-pill bg-danger">InActive</span>

                        @else
                        <span class="badge badge-pill bg-success">Active</span>
    
                        @endif
                        

                    </td> 
                    <td colspan="2">
      <a href="{{ route('edit.news.post',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

      <a href="{{ route('delete.news.post',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="DeleteBtn">Delete</a>


      @if($item->status == 1)
 <a href="{{ route('inactive.news.post',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" title="Inactive"><i class="fas fa-thumbs-down"></i> </a>
      @else
 <a href="{{ route('active.news.post',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light" title="Active"><i class="fas fa-thumbs-up"></i> </a>
      @endif 

                    </td> 
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


