@extends('frontend.home_dashboard')
@section('home')

@section('title', $news->news_title)

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">

            <div class="single-add">
            </div>

            <div class="single-cat-info">
                <div class="single-home">
                    <i class="la la-home"> </i><a href=" "> HOME </a>
                </div>
                <div class="single-cats">
                    <i class="la la-bars"></i> <a href="{{ url('news/category/' . $news->category->id . '/' . $news->category->category_slug) }}" rel="category tag">{{ $news->category->category_name }}</a>,

                    @if($news->subcategory_id == NULL)
                    <a href=" " rel="category tag"> </a>
                    @else
                    <a href="{{ url('news/subcategory/' . $news->subcategory->id . '/' . $news->subcategory->subcategory_slug) }}" rel="category tag">{{ $news->subcategory->subcategory_name }}</a>
                    @endif
                </div>
            </div>

            <h1 class="single-page-title">
                {{GoogleTranslate::trans($news->news_title , app()->getLocale())  }} </h1>
            <div class="row g-2">
                <div class="col-lg-1 col-md-2 ">
                    <div class="reportar-image">
                        <a href="{{ route('reporter.news.post',$news->user->id) }}">   <img
                            src="{{ (!empty($news->user->photo)) ? url($news->user->photo): url('upload/no_image.jpg') }}"> </a>
                    </div>
                </div>
                <div class="col-lg-11 col-md-10">
                    <div class="reportar-title">
                        Posted By <a href="{{ route('reporter.news.post',$news->user->id) }}">{{ $news->user->name }} </a> 
                    </div>
                    <div class="viwe-count">
                        <ul>
                            <li><i class="la la-clock-o"></i> Updated
                                {{ $news->created_at->format('l , M d Y') }}
                            </li>
                            <li> / <i class="la la-eye"></i>
                                {{ $news->view_count }}
                                Read
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="single-image">
                <a href=" "><img class="lazyload" src="{{ asset($news->image) }}"></a>
                <h2 class="single-caption2">
                    {{GoogleTranslate::trans($news->news_title , app()->getLocale())  }}

                </h2>
            </div>

            <div class="single-page-add2">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                    </div>
                </div>
            </div>
            <div class="single-details">
               
                <p>   {{GoogleTranslate::trans($news->news_details , app()->getLocale())  }} </p>
            </div>
            <div class="singlePage2-tag">
                <span> Tags : </span>

                @foreach($tags_all as $tag)
                <a href=" " rel="tag">                    {{GoogleTranslate::trans(ucwords($tag) , app()->getLocale())  }}
                </a>
                @endforeach
            </div>

            <div class="single-add">
                <div class="themesBazar_widget">
                    <div class="textwidget">
                        <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                    </div>
                </div>
            </div>

            <h3 class="single-social-title">
                Share News </h3>
            <div class="single-page-social">
                <a href=" " target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a><a href=" "
                    target="_blank"><i class="lab la-twitter"></i></a><a href=" " target="_blank"><i
                        class="lab la-linkedin-in"></i></a><a href=" " target="_blank"><i class="lab la-digg"></i></a><a
                    href=" " target="_blank"><i class="lab la-pinterest-p"></i></a><a onclick="printFunction()"
                    target="_blank"><i class="las la-print"></i>
                    <script>
                        function printFunction() {
                            window.print();
                        }

                    </script>
                </a>
            </div>
@php
    $reviews = App\Models\NewsComment::where(['status'=>1])->where(['news_id'=>$news->id])->limit(5)->get();
@endphp

      @forelse ($reviews as $review)
          
     
            <div class="author2">
                <div class="author-content2">
                    <h6 class="author-caption2">
                        <span> COMMENTS </span>
                    </h6>
                    <div class="author-image2">
                        <img alt="" src="{{ !empty($review->user->photo) ? asset($review->user->photo) : url('upload/no_image.jpg') }}" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"> </div>
                    <div class="authorContent" id="commentList">
                        <h1 class="author-name2">
                            <a href=" "> {{ $review->user->name }} </a>
                        </h1>
                        <div class="author-details">{{ $review->comment }}</div>
                    </div>

                </div>
            </div>

            @empty
                <div class="authorContent" id="commentList">
                <h1 class="author-name2">
                  {{--   <a href=" "> </a> --}}
                </h1>
                <div class="author-details">No Reviews is found</div>
            </div>
            @endforelse

            <hr>

           {{--  <form id="comment-form" action="{{ route('store.comment') }}" method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate"
                data-status="init"> --}}
                {{-- <form id="comment-form"> --}}

                    
            <form id="comment-form" action="{{ route('store.review') }}" method="POST">
                @csrf

                @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                    @endif

                <input type="hidden" id="news_id" value="{{ $news->id }}" name="news_id">
                <div style="display: none;">

                </div>
                <div class="main_section">
                    {{-- <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="contact-title ">
                                Subject *
                            </div>
                            <div class="contact-form">
                                <span class="wpcf7-form-control-wrap sub_title"><input type="text" name="sub_title"
                                        value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                                        placeholder="News Sub Title"></span>
                            </div>
                        </div>
                    </div> --}}

                 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-title">
                                Comments *
                            </div>
                            <div class="contact-form">
                              <span class="wpcf7-form-control-wrap news">
                    <textarea id="content" @disabled(auth()->guest()) name="content" cols="20" rows="5" style="{{ auth()->guest() ? 'cursor:not-allowed':'cursor:text' }}" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false"
                                        placeholder="News Details...."> </textarea>
                                    </span>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="contact-btn">
                            <input @disabled(auth()->guest()) type="submit" style="{{ auth()->guest() ? 'cursor:not-allowed':'cursor:pointer' }}" value="Submit Comments"
                                class="wpcf7-form-control has-spinner wpcf7-submit">
                                
                                <span class="wpcf7-spinner"></span>

                                @if (auth()->guest())
                                <p><b> For Add Product Review. You Need To Login First <a href="{{ route('login') }}"> Login Page</a> </b> </p>
                                @endif 
                        </div>
                        {{-- <div class="contact-btn"> --}}
                           
                       
                                
                            {{--     <span class="wpcf7-spinner"></span>
                        </div> --}}
                    </div>
                </div>

                <div class="wpcf7-response-output" aria-hidden="true"></div>
            </form>




            <div class="single_relatedCat">
                <a href=" ">Related News </a>
            </div>
            <div class="row">

                @foreach($related_posts as $item)
                <div class="themesBazar-3 themesBazar-m2">
                    <div class="related-wrpp">
                        <div class="related-image">
                            <a href="{{ url("/news/post/details/$item->id/$item->news_title_slug") }}"><img
                                    class="lazyload" src="{{ asset($item->image) }}"></a>
                        </div>
                        <h4 class="related-title">
                            <a href="{{ url("/news/post/details/$item->id/$item->news_title_slug")  }}">
                                {{GoogleTranslate::trans($news->news_title , app()->getLocale())  }}

                            </a>
                        </h4>
                        <div class="related-meta">
                            <a href=" "><i class="la la-tags"> </i>
                                {{ $news->created_at->format('l M d Y') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="sitebar-fixd" style="position: sticky; top: 0;">
                <div class="siteber-add">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="singlePopular">
                    <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent"
                                role="tab" aria-controls="archiveRecent" aria-selected="true"> LATEST </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab"
                                aria-controls="archivePopulars" aria-selected="false"> POPULAR </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContentarchive">
                    <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
                        aria-labelledby="archiveRecent">

                        <div class="archiveTab-sibearNews">
							@foreach ($latest_posts as $key => $item)
							<div class="archive-tabWrpp archiveTab-border">
                                <div class="archiveTab-image ">
                                    <a href="{{ url("news/post/details/$item->id/$item->news_title_slug") }}"><img class="lazyload" src="{{ asset($item->image) }}"></a> </div>
                                <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                <h4 class="archiveTab_hadding"><a href=" "> {{ GoogleTranslate::trans(Str::limit($item->news_title,30),app()->getLocale()) }} </a>
                                </h4>
                                <div class="archive-conut">
                                   {{ ++$key; }}
                                </div>

                            </div>
							@endforeach
						</div>
                    </div>
                    <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel"
                        aria-labelledby="archivePopulars">
                        <div class="archiveTab-sibearNews">

							@foreach ($popular_posts as $key => $item)
							<div class="archive-tabWrpp archiveTab-border">
                                <div class="archiveTab-image ">
                                    <a href="{{ url("news/post/details/$item->id/$item->news_title_slug") }}"><img class="lazyload" src="{{ asset($item->image) }}"></a> </div>
                                <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                <h4 class="archiveTab_hadding"><a href=" "> {{ GoogleTranslate::trans(Str::limit($item->news_title,30),app()->getLocale()) }} </a>
                                </h4>
                                <div class="archive-conut">
                                   {{ ++$key; }}
                                </div>

                            </div>
							@endforeach
                          
                        </div>
                    </div>
                </div>
                <div class="siteber-add2">
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fetch and display comments
            function fetchComments() {
                $.ajax({
                    url: '/comments',
                    type: 'GET',
                    success: function (data) {
                        var commentsHtml = '';
                        data.forEach(function (comment) {
                            commentsHtml += '<li>' + comment.content +
                                            ' <button class="deleteBtn" data-id="' + comment.id + '">Delete</button></li>';
                        });
                        $('#commentList').html(commentsHtml);
                    }
                });
            }

            fetchComments(); // Initial fetch

            // Add a new comment
            $('#comment-form').submit(function (e) {
                e.preventDefault();
                var content = $('#content').val();
                var news_id  = $('#news_id').val();
                var 

                $.ajax({
                    url: '/comments',
                    type: 'POST',
                    data: { content: content,news_id:news_id },
                    success: function () {
                        $('#content').val('');
                        fetchComments(); // Fetch and update the list
                    }
                });
            });

            // Delete a comment
            $(document).on('click', '.deleteBtn', function () {
                var id = $(this).data('id');
                
                $.ajax({
                    url: '/comments/' + id,
                    type: 'DELETE',
                    success: function () {
                        fetchComments(); // Fetch and update the list
                    }
                });
            });
        });

</scrip>





@endsection
