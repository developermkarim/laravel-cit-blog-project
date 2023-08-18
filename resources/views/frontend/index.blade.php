@extends('frontend.home_dashboard')
@section('home')

@section('title','24-News')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

        </div>
    </div>
</div>

<section class="themesBazar_section_one">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-7 col-md-7">

                        <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">

@php
    $news_sliders = App\Models\NewsPost::where(['top_slider'=>1])->limit(3)->get();
    // dd($news_sliders);
@endphp

                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">

                                    @foreach ($news_sliders as $news)
                                        
                                    <div class="owl-item cloned" style="width: 506.25px; margin-right: 20px;">

                                        <div class="secOne_newsContent">
                                            <div class="sec-one-image">
                                                <a href=" "><img class="lazyload" src="{{ asset($news->image) }}"></a>
                                                <h6 class="sec-small-cat">
                                                    <a href=" ">
                                                        {{-- 8 September 2022, 09:31 PM --}}
                                                     
                                                     @php
                                                        date_default_timezone_set('Asia/Dhaka');

                                                         $today = Carbon\Carbon::create($news->created_at);
                                                      echo  $today->format('j F Y, h:i A');
                                                     @endphp 
                                                       
                                                        
                                                    </a>
                                                </h6>
                                                <h1 class="sec-one-title">
                                                    <a href="{{ url('news/post/details/'.$news->id) . '/' . $news->news_title_slug }}">{{
                                                        GoogleTranslate::trans($news->news_title,app()->getLocale()) }}</a>
                                                </h1>
                                            </div>
                                        </div>

                                    </div>

                                    @endforeach
                                  
                                </div>
                            </div>

                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="fa-solid fa-angle-left"></i></button>
                                <button type="button" role="presentation" class="owl-next"><i
                                        class="fa-solid fa-angle-right"></i></button></div>

                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                    role="button" class="owl-dot active"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button></div>

                        </div>




                    </div>
                    <div class="col-lg-5 col-md-5">

                        @php
                            $sec_news_three = App\Models\NewsPost::where(['first_section_three'=>1])->limit(3)->get();
                        @endphp

                        @foreach ($sec_news_three as $three)
                            
                        
                        <div class="secOne-smallItem">
                            <div class="secOne-smallImg">
                                <a href=" "><img class="lazyload" src="{{ asset($three->image) }}"></a>
                                <h5 class="secOne_smallTitle">
                                    <a href="{{ url("news/post/details/$three->id/$three->news_title_slug") }}">{{ GoogleTranslate::trans($three->news_title,app()->getLocale()) }}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="sec-one-item2">
                    <div class="row">
                      @php
                        /*  $first_section_news = App\Models\NewsPost::where(['status'=>1])->where(['first_section_nine'=>1])->limit(9)->get(); */
                      @endphp

                       @foreach (App\Models\NewsPost::where(['status'=>1])->where(['first_section_nine'=>1])->limit(9)->get() as $first_section_nine)
                           
                       
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload" src="{{ asset($first_section_nine->image) }}"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">{{ GoogleTranslate::trans($first_section_nine->news_title,app()->getLocale()) }} </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        {{ date('d-m-Y',strtotime($first_section_nine->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="live-item">
                    <div class="live_title">
                        <a href=" ">LIVE TV </a>
                        <div class="themesBazar"></div>
                    </div>
                    <div class="popup-wrpp">
                        <div class="live_image">
                            <img width="700" height="400" src="assets/images/lazy.jpg"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                loading="lazy">
                            <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i>
                            </div>
                        </div>
                        <div class="live-popup">
                            <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles"
                                aria-describedby="modal-contents">
                                <div id="modal-contents">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe class="" src=" " allowfullscreen="allowfullscreen" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> OLD NEWS </h3>
                </div>
                <form class="wordpress-date" action=" " method="post">
                    <input type="date" id="wordpress" placeholder="Select Date" autocomplete="off" value="" name="m"
                        required="" class="hasDatepicker">
                    <input type="submit" value="Search">
                </form>
                <div class="recentPopular">
                    <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active" id="recent-tab" data-bs-toggle="pill" data-bs-target="#recent"
                                role="tab" aria-controls="recent" aria-selected="false"> LATEST </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular"
                                role="tab" aria-controls="popular" aria-selected="false"> POPULAR </div>
                        </li>
                    </ul>
                </div>

                {{-- This div of both popular and latest news --}}

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane active show  fade" id="recent" role="tabpanel" aria-labelledby="recent">
                        <div class="news-titletab">

                            @foreach ($latest_posts as $item)
                                <div class="tab-image tab-border">
                                    <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                            class="lazyload" src="{{ asset($item->image) }}"></a>
                                    <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                    <h4 class="tab_hadding"><a
                                            href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ GoogleTranslate::trans($item->news_title, app()->getLocale()) }}
                                        </a></h4>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                        <div class="news-titletab">

                            @foreach ($popular_posts as $item)
                                <div class="tab-image tab-border">
                                    <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                            class="lazyload" src="{{ asset($item->image) }}"></a>
                                    <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                    <h4 class="tab_hadding"><a
                                            href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ GoogleTranslate::trans($item->news_title, app()->getLocale()) }}
                                        </a></h4>
                                </div>
                            @endforeach






                        </div>
                    </div>
                </div>



                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <iframe src=" " width="260" height="170" style="border:none;overflow:hidden" scrolling="no"
                        frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <div class="twitter-timeline twitter-timeline-rendered"
                        style="display: flex; width: 410px; max-width: 100%; margin-top: 0px; margin-bottom: 0px;">
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true"
                            allowfullscreen="true" class=""
                            style="position: static; visibility: visible; width: 279px; height: 220px; display: block; flex-grow: 1;"
                            title="Twitter Timeline" src=" "></iframe></div>
                    <script async="" src="assets/js/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
</section>


@php
    $banner = App\Models\Banner::find(1);
@endphp
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{-- {{ asset($banner->home_one) }} --}}" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{-- {{ asset($banner->home_two) }} --}}" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- End Banner Here --}}

{{-- News and Categories Here --}}

@php
    $news = App\Models\NewsPost::orderBy('id','DESC')->where(['status'=>1])->limit(8)->get();
    $categories =  App\Models\Category::orderBy('category_name','DESC')->get();
@endphp

<section class="section-two">
    <div class="container">
        <div class="secTwo-color">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="themesBazar_cat6">
                        <ul class="nav nav-pills" id="categori-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="categori-tab1" data-bs-toggle="pill"
                                    data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1"
                                    aria-selected="true">
                                    ALL
                                </div>
                            </li>
                            @foreach ($categories as $item)
                                
                            
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="categori-tab2" data-bs-toggle="pill"
                                    data-bs-target="#category{{ $item->id }}" role="tab" aria-controls="Info-tabs2"
                                    aria-selected="false">
                                    {{ GoogleTranslate::trans($item->category_name,app()->getLocale())  }}
                                    </div>
                            </li>
                            @endforeach
                            <span class="themeBazar6"></span>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                       

                        <div class="tab-pane fade active show" id="Info-tabs1" role="tabpanel"
                        aria-labelledby="categori-tab1 ">
                        <div class="row">

                            @foreach ($news as $item)
                            <div class="themesBazar-4 themesBazar-m2">
                                <div class="sec-two-wrpp">
                                    <div class="section-two-image">

                                        <a href=" "><img class="lazyload"
                                                src="{{ asset($item->image) }}"></a>
                                    </div>
                                    <h5 class="sec-two-title">
                                        <a
                                            href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ GoogleTranslate::trans($item->news_title,app()->getLocale()) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        </div>
                        

                        @foreach ($categories as $category)
                            
                       
                 <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="categori-tab2">
                            <div class="row">

                                @php
                                    $catwiseNews = App\Models\NewsPost::where(['category_id' => $category->id])->get();
                                @endphp

                                 @foreach ($catwiseNews as $item)
                                 <div class="themesBazar-4 themesBazar-m2">
                                     <div class="sec-two-wrpp">
                                         <div class="section-two-image">
                                             <a href=" "><img class="lazyload"
                                                     src="{{ asset($item->image) }}"></a>
                                         </div>
                                         <h5 class="sec-two-title">
                                             <a
                                                 href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ GoogleTranslate::trans($item->news_title,app()->getLocale()) }}
                                             </a>
                                         </h5>
                                     </div>
                                 </div>
                             @endforeach
                               
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset($banner->home_three) }}" alt="" width="100%" height="auto">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset($banner->home_four) }}" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <h2 class="themesBazar_cat07"> <a
                        href="{{ url('news/category/' . $skip_cat_0->id . '/' . $skip_cat_0->category_slug) }}"> <i
                            class="las la-align-justify"></i> {{ GoogleTranslate::trans($skip_cat_0->category_name,app()->getLocale())}} </a> </h2>

                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        @foreach ($skip_news_0 as $item)
                            @if ($loop->index < 1)
                                <div class="secThree-bg">
                                    <div class="sec-theee-image">
                                        <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                    </div>
                                    <h4 class="secThree-title">
                                        <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }} ">
                                            {{ GoogleTranslate::trans($item->news_title,app()->getLocale())  }} </a>
                                    </h4>
                                </div>
                            @endif
                        @endforeach


                    </div>
                    

                    <div class="col-lg-6 col-md-6">
                        <div class="bg2">

                            @foreach ($skip_news_0 as $item)
                                @if ($loop->index > 0)
                                    <div class="secThree-smallItem">
                                        <div class="secThree-smallImg">
                                            <a href=" "><img class="lazyload"
                                                    src="{{ asset($item->image) }}"></a>
                                            <a href=" " class="small-icon3"><i class="la la-play"></i></a>
                                            <h5 class="secOne_smallTitle">
                                                <a
                                                    href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ GoogleTranslate::trans($item->news_title,app()->getLocale()) }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endif
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">



                <div class="map-area" style="width:100%; background: #eff3f4;">
                    <div style="padding:5px 35px 0px 35px;">
                        <img class="lazyload" src="{{ asset('frontend/assets/images/lazy.jpg') }}"></a>
                        <br> <br>
                        <img class="lazyload" src="{{ asset('frontend/assets/images/lazy.jpg') }}"></a>

                    </div>
                </div>
            </div>
        </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-four">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="themesBazar_cat04"> <a
                        href="{{ url('news/category/' . $skip_cat_2->id . '/' . $skip_cat_2->category_slug) }}"> <i
                            class="las la-align-justify"></i> {{ GoogleTranslate::trans($skip_cat_2->category_name,app()->getLocale()) }} </a> </h2>

                <div class="secFour-slider owl-carousel owl-loaded owl-drag">


                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3294px, 0px, 0px); transition: all 1s ease 0s; width: 4792px;">

                            @foreach ($skip_news_2 as $item)
                                <div class="owl-item" style="width: 289.5px; margin-right: 10px;">
                                    <div class="secFour-wrpp ">
                                        <div class="secFour-image">
                                            <a href=" "><img class="lazyload"
                                                    src="{{ asset($item->image) }}"></a>
                                            <h5 class="secFour-title">
                                                <a
                                                    href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }} ">
                                                    {{ GoogleTranslate::trans($item->news_title,app()->getLocale()) }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                class="las la-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="las la-angle-right"></i></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                            role="button" class="owl-dot active"><span></span></button></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-five">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a
                        href="{{ url('news/category/' . $skip_cat_1->id . '/' . $skip_cat_1->category_slug) }}">{{ $skip_cat_1->category_name }}</a>
                    <span> <a href="{{ url('news/category/' . $skip_cat_1->id . '/' . $skip_cat_1->category_slug) }}">{{ GoogleTranslate::trans('More',app()->getLocale()) }} More
                            <i class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">

                    @foreach ($skip_news_1 as $item)
                        @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                <div class="secFive-title">
                                    <a
                                        href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ GoogleTranslate::trans($item->news_title,app()->getLocale())  }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach


                    @foreach ($skip_news_1 as $item)
                        @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">
                                            {{  GoogleTranslate::trans($item->news_title,app()->getLocale())  }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> {{  GoogleTranslate::trans('INTERNATIONAL',app()->getLocale())  }}  </a> <span> <a href=" ">  {{  GoogleTranslate::trans('More',app()->getLocale())  }}  <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">How important are box office numbers</a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">How important are box office numbers</a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">How important are box office numbers</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> SPORTS </a> <span> <a href=" "> More <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Britney Spears says "I don't believe in God anymore" </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Britney Spears says "I don't believe in God anymore" </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Britney Spears says "I don't believe in God anymore" </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="section-five">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> EDUCATION </a> <span> <a href=" "> More <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> SCI-TECH </a> <span> <a href=" "> More <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> SCI-TECH </a> <span> <a href=" ">More <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                            </h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>





<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-seven">
    <div class="container">

        <h2 class="themesBazar_cat01"> <a href=" ">  {{ GoogleTranslate::trans($skip_cat_4->category_name,app()->getLocale())  }} </a> <span> <a
                    href="{{ url('news/category/' . $skip_cat_4->id . '/' . $skip_cat_4->category_slug) }}">{{ GoogleTranslate::trans('More',app()->getLocale())  }}  <i
                        class="las la-arrow-circle-right"></i> </a></span> </h2>

        <div class="secSecven-color">
            <div class="row">


                <div class="col-lg-5 col-md-5">

                    @foreach ($skip_news_4 as $item)
                        @if ($loop->index < 1)
                            <div class="black-bg">

                                <div class="secSeven-image">
                                    <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a> <a
                                        href=" " class="video-icon6"><i class="la la-play"></i></a>
                                </div>
                                <h6 class="secSeven-title">
                                    <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}
                                    </a>
                                </h6>
                                <div class="secSeven-details">


                                    <a href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">
                                        More..</a>
                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>


                <div class="col-lg-7 col-md-7">
                    <div class="row">

                        @foreach ($skip_news_4 as $item)
                            @if ($loop->index > 0)
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" "><img class="lazyload"
                                                    src="{{ asset($item->image) }}"></a>
                                            <h5 class="secSeven-title2">
                                                <a
                                                    href="{{ url('news/post/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-five">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i> ENTERTAINMENT
                    </a> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i> FEATURE </a>
                </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                            </h5>
                        </div>
                    </div>

                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i> FACEBOOK NEWS
                    </a> </h2>

                <div class="white-bg">
                    <div class="secFive-image">
                        <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                        <div class="secFive-title">
                            <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <h5 class="secFive_title2">
                                <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-ten">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-camera"></i> PHOTO GALLERY </a>
                </h2>

                <div class="homeGallery owl-carousel owl-loaded owl-drag">



                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">

                            @php
                                $photo_gallery1 = App\Models\PhotoGallery::latest()->get();
                            @endphp

                            @foreach ($photo_gallery1 as $item)
                                <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="photo">
                                            <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                            <h3 class="photoCaption">
                                                <a href=" ">{{ $item->post_date }} </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                class="las la-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
                <div class="homeGallery1 owl-carousel owl-loaded owl-drag">







                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">

                            @php
                                $photo_gallery = App\Models\PhotoGallery::latest()->get();
                            @endphp

                            @foreach ($photo_gallery as $item)
                                <div class="owl-item " style="width: 122.333px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="phtot2">
                                            <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                </div>
            </div>




            <div class="col-lg-4 col-md-4">

               <div class="video-gallary">

                <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> VIDEO GALLERY </a>
                </h2>

                <div class="white-bg">

                    @php
                        $video_gallery = App\Models\VideoGallery::latest()->get();
                    @endphp

                    @foreach ($video_gallery as $video)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <img src="{{ asset($video->video_image) }}">
                                <a href="{{ $video->video_url }}" class="home-video-icon popup"><i
                                        class="las la-video"></i></a>
                                <h5 class="secFive_title2">
                                    <a href="{{ $video->video_url }}" class="popup"> {{ $video->video_title }} </a>
                                </h5>
                            </div>
                        </div>
                    @endforeach


                </div>

                </div>


            </div>


            


        </div>
    </div>
</section>

			<!-- Section  archive , online Polling Vote and News Tags SEnd News and see news for local -->

			<section class="section-ten mt-5">
				<!-- This container archive , online Polling Vote and News Tags Start -->
				<div class="container">
					<div class="row">

						<div class="col-lg-4 col-md-4">

                            <div class="archive-heading">
								<h2 class="themesBazar_cat01"> <i class="fas fa-vote-yea"></i> Online Poll

								</h2>
							</div>
		

@php
    $online_polls = App\Models\OnlinePoll::orderBy('id','DESC')->first();
    $total_vote = $online_polls->yes + $online_polls->no + $online_polls->no_opinion;

   if ($online_polls->yes =='0') {

    $yes_vote_percentage = 0;

   }else{

    $yes_vote_percentage = ($yes_vote_percentage*100)/$total_vote;
    $yes_vote_percentage = ceil($yes_vote_percentage);

   };

   if($online_polls->no =='0'){
    $no_vote_percentage = 0;
   }else{
    $no_vote_percentage = (no_vote_percentage*100)/$total_vote;
    $no_vote_percentage = ceil($no_vote_percentage);
   };

   if($online_polls->no_opinion=='0'){
    $no_opiniton_vote_percentage = 0;
   }else{
    $no_opiniton_vote_percentage = (no_opiniton_vote_percentage*100)/$total_vote;
    $no_opiniton_vote_percentage = ceil($no_opiniton_vote_percentage);
   }
@endphp



                @if(session()->get('current_poll_id') == $online_polls->id )
                    <div class="poll-result">                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width:100px;">{{ "YES" }} ({{ $online_polls->yes }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_vote_percentage }}%" aria-valuenow="{{ $yes_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ "NO" }} ({{ $online_polls->no }})</td>
                                    <td>
                                        
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_vote_percentage }}%" aria-valuenow="{{ $no_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ "NO_OPINION" }} {{ $online_polls->no_opinion }}</td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_opiniton_vote_percentage }}%" aria-valuenow="{{ $no_opiniton_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_opiniton_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('poll_previous') }}" class="btn btn-primary old" style="margin-top:0;">{{ "OLD_RESULTS" }}</a>
                    </div>

                @endif

                @if(session()->get('current_poll_id') != $online_polls->id)
                        
                    
                        <form action="{{ route('vote.store') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="vote_id" value="{{ $vote->id }}">
                                    
                                    <div class="">
                                       
                                        <img src="..." class="d-block w-100" alt="...">

                                        <h2>{!! $vote->title !!}   </h2>

                                        <div class="d-flex flex-wrap">

                                            <div class="form-check me-2">
                                                <input class="form-check-input" type="radio" name="result" id="poll_id_1" value="yes">
                        
                                                <label class="form-check-label" for="poll_id_1">Yes</label>
                                            </div>
                        
                                            <div class="form-check me-2">
                                                <input class="form-check-input" type="radio" name="result" id="poll_id_2" value="no">
                                                <label class="form-check-label" for="poll_id_2">No</label>
                                            </div>

                                            <div class="form-check me-2">
                                                <input class="form-check-input" type="radio" name="result" id="poll_id_3" value="no_opinion">
                                                <label class="form-check-label" for="poll_id_3">No Opinion</label>
                                            </div>               
                                        </div>
                                      </div>
                                       
                              <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        </form>
                @endif
                    </div>

                        {{-- ONline Poll vote Here End --}}

                        @php
                            $news_post_data = App\Models\NewsPost::where('id','DESC')->get();

                            $archive_arr=[];
                        foreach ($news_post_data as $key => $value) {
                            $string_time = strtotime($value->created_at);
                            $day = date('d',$string_time);
                            $month = date('m',$string_time);
                            $month_full = date('F',$string_time);
                            $year = date('Y',$string_time);
                            $archive_arr[] = "$day-$month_full-$year";
                        }
                        $archive_arr = array_values(array_unique($archive_arr));
                        @endphp

						<!-- archive Here Start -->
						<div class="col-lg-4 col-md-4 archive">

							<div class="archive-heading">
								<h2 class="themesBazar_cat01"> <i class="fas fa-archive"></i>Archive

								</h2>
                                
							</div>

							<div class="archive">
								<form action="http://127.0.0.1:9999/archive/show" method="post">
                                    @csrf
									
									<select name="archive_month_year" class="form-select" onchange="this.form.submit()">
										<option value="">Select Month</option>
									
                                            @for ($i=0; $i < count($archive_arr); $i++)
                                                
                                            @php
                                                $date_arr = explode('-',$archive_arr[i]);
                                            @endphp
                                      <option value="{{ $date_arr[0].'-'.$date_arr[2] }}">{{ $date_arr[1] }}, {{ $date_arr[2] }}</option>
                                        @endfor;

									</select>
								</form>
							</div>

						</div>
						<!-- archive Here End -->

						<!-- Popular Tag  -->

						<div class="col-lg-4 col-md-4">

							<div class="video">
								<h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> Popular Tags
									</a>
								</h2>

							</div>


						</div>

						<!-- Popular Tag End -->

					</div>



				</div>

				<!-- This Container See News OF Local and Send News to Us -->
				<div class="container mt-5">
					<div class="row">

						<div class="col-lg-4 col-md-4">

							<div class="online">
								<h2 class="themesBazar_cat01"> <a href=""> <i class="fas fa-vote-yea"></i> See News by
										Specific Location
									</a>
								</h2>

							</div>

						</div>


						<!-- Form to submit news Here Start -->
						<div class="col-lg-8 col-md-8">

							<div class="archive-heading">
								<h2 class="themesBazar_cat01"> <i class="fas fa-archive"></i>

									Send Your News To Us
								</h2>
							</div>

							<div class="row">
								<div class="col-12">
									<div class="card">
										<div class="card-body">

											<form id="myForm" method="post" action="http://127.0.0.1:8000/store/admin"
												enctype="multipart/form-data" novalidate="novalidate">
												<input type="hidden" name="_token"
													value="FOyqS3h9Kl2dz7WovTNJ5e5teyg9oAIbCugrM9hi">

												<div class="row">
													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">User Name </label>
														<input type="text" name="username" class="form-control"
															id="inputEmail4">
													</div>

													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label"> Name </label>
														<input type="text" name="name" class="form-control"
															id="inputEmail4">
													</div>


													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Email </label>
														<input type="email" name="email" class="form-control"
															id="inputEmail4">
													</div>

													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Phone </label>
														<input type="text" name="phone" class="form-control"
															id="inputEmail4" aria-invalid="false">
													</div>

													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Password </label>
														<input type="password" name="password" class="form-control"
															id="password" aria-invalid="false">
														<i id="eye-icon"
															style="position: relative;left:395px;top:-28px;color:rgb(79, 79, 79);"
															class="fa fa-eye"></i>

													</div>


													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Asign Roles </label>
														<select name="roles" class="form-select" id="example-select">

															<option value="">Select One Role</option>
															<option value="2">
																Editor
															</option>
															<option value="4">
																Super-Admin
															</option>
															<option value="15">
																Admin
															</option>
															<option value="16">
																Reporter
															</option>
														</select>
													</div>

													<div class="form-group col-md-6 mb-3">
														<label for="inputEmail4" class="form-label">Upload Your Image
														</label>
														<input type="file" id="photo" name="photo" class="form-control"
															onchange="thunmbnail_Url(this)">
														<img src="" id="image" alt="">
													</div>

												</div>



												<button type="submit"
													class="btn btn-primary waves-effect waves-light">Save
													Changes</button>

											</form>

										</div> <!-- end card-body -->
									</div> <!-- end card-->
								</div> <!-- end col -->
							</div>

						</div>
						<!-- Form Here to Send News End -->

						
					</div>



				</div>


				<!-- This Container See News OF Local and Send News to Us -->

			</section>
			<!-- Section  archive , online Polling Vote and News Tags SEnd News and see news for local end -->

</div>

@endsection
