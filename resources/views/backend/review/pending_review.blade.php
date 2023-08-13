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
                            <a href="{{ route('review.approved') }}"
                                class="btn btn-blue waves-effect waves-light">Approved Review </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Pending Review <span class="btn btn-danger"> {{ count($review) }} </span>
                    </h4>
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
                                    <th>Image </th>
                                    <th>News </th>
                                    <th>User </th>
                                    <th>Comment </th>
                                    <th>Status </th>
                                    <th>Action </th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($review as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->news->image ) }} " style="width: :30px; height:40px;">
                                    </td>
                                    <td>{{ Str::limit($item['news']['news_title'] ,20)  }}</td>
                                    <td>{{ $item['user']['username'] }}</td>
                                    <td>{{ Str::limit($item->comment ,10)  }}</td>
                                    <td>
                                        @if($item->status == 0)
                                        <span class="badge badge-pill bg-danger">Pending</span>

                                        @else
                                        <span class="badge badge-pill bg-success">Publish</span>
                                        @endif


                                    </td>
                                    {{--  <td class="flex justify-content-between">
      <a href="{{ route('review.approve',$item->id) }}" class="btn btn-primary rounded-pill waves-effect
                                    waves-light">Approve</a>

                                    &nbsp; &nbsp;
                                    <a href="{{ url("delete/review/$item->id") }}"
                                        class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>

                                    </td> --}}

                                    <td>
                                        <a href="{{ route('review.approve',$item->id) }}"
                                            class="btn btn-primary rounded-pill waves-effect waves-light">Approve</a>

                                        <a href="{{ url("delete/review/$item->id") }}"
                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                            id="DeleteBtn">Delete</a>


                                        <a href="" class="btn btn-primary rounded-pill waves-effect waves-light"
                                            title="show-comment" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>


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

{{-- Modal of SHow Comment --}}

<!-- Modal -->




@foreach($review as $key=> $item)

<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>
                                User :
                            </th>

                            <td>

                                {{ $item->user->username }} <img src="{{ !empty($item->user->photo) ? url($item->user->photo) : asset('upload/no_image.png') }}" alt="" width="30" height="30" class="round">

                            </td>
                        </tr>

                        <tr>
                            <th>
                                News :
                            </th>
                            <td>{{ Str::limit($item['news']['news_title'] ,20)  }}
                                <img src="{{ asset($item->news->image) }}" alt="" style="width: :30px; height:40px;" class="round">
                            </td>


                        </tr>

                        <tr>
                            <th>
                                Comment :
                            </th>
                            <td>
                                {{ $item->comment }}
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- <tr>
                                    <td>{{ $key+1 }}</td>

                        <td>
                            {{ $item->user->username }}
                        </td>

                        <td>{{ Str::limit($item['news']['news_title'] ,20)  }}</td>

                        <td>
                            {{ $item->comment }}
                        </td>
                        </tr> --}}

                    </tbody>
                </table>

                {{--  <td><img src="{{ asset($item->news->image ) }} " style="width: :30px; height:40px;" ></td>
                <td>{{ Str::limit($item['news']['news_title'] ,20)  }}</td>
                <td>{{ $item['user']['username'] }}</td>
                <td>{{ Str::limit($item->comment ,10)  }}</td>
                <td> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endforeach;
<!-- Modal -->





@endsection
