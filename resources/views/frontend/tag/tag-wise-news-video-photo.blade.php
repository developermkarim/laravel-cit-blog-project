@extends('frontend.home_dashboard')
@section('home')
@php
    $TagName = basename(request()->path());
@endphp
@section('title', "News24 | tag / $TagName")

<style>
    .video-container {
    position: relative;
    overflow: hidden;
    width: 640px; /* Set your desired initial width */
    height: 360px; /* Set your desired initial height */
}

.video-container {
    position: relative;
    width: 560px; /* Adjust width and height according to your needs */
    height: 315px;
    overflow: hidden;
    cursor: pointer;
}

.video-container.zoomed {
    width: 800px; /* Zoomed width */
    height: 450px; /* Zoomed height */
    transition: all 0.3s ease-in-out;
}


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ "SEARCH_RESULT" }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">RESULT Of {{ $TagName }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">


<section class="themesBazar_section_one">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                   
                </div>


              {{--   <div class="archive-heading">
                    <h2 class="themesBazar_cat01"> <i class="fa fa-newspaper-o"></i> News of Tag ({{ $TagName }})

                    </h2>
                </div> --}}
                <div class="live_title">
                    <a href="javascript:void(0);"><i class="fa fa-newspaper-o"></i> News of Tag ({{ $TagName }})
  
                      </a> 
                      
                    
                  </div>

                <div class="sec-one-item2">
                    <div class="row">

                        @if (isset($tagNews))
                        
                        @foreach ($tagNews as $news)
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <img id="photo1" class="zoomable"
                                                src="{{ asset($news->image) }}" data-zoom-image="{{ asset($news->image) }}">
                                    </div>
                                    {{--  <img id="photo1" src="{{ asset('path_to_your_photo.jpg') }}" data-zoom-image="{{ asset('path_to_zoomed_photo.jpg') }}" class="zoomable"> --}}

                                    <h4 class="secOne-title2">
                                        <a href="{{ url("news/post/details/$news->id/$news->news_title_slug") }}">{{ GoogleTranslate::trans($news->news_title,app()->getLocale()) }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                     <i class="lar la-newspaper"></i>
                                        {{ date('d-m-Y',strtotime($news->created_at)) }}
                                </div>
                            </div>
                        </div>  
                        @endforeach

                       @endif
                       @if(count($tagNews) < 1)

                        <div class="container my-5 p-3">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-dark text-center p-3">
                                        <h4 class="alert-heading">Sorry! No News  is Available for The Tag</h4>
                                        <p class="mb-0">Please explore other content or try a different tag.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif
                     
                  </div>



                    
                 

               
                    </div>


                  
                    <div class="live_title">
                      <a href="javascript:void(0);"><i class="fa fa-file-video-o"></i>   Video Gallery of Tag ({{ $TagName }})
    
                        </a> 
                        
                      
                    </div>

                    <div class="sec-one-item2">
                        <div class="row">
                            
                            @if (isset($tagVideos))
                                
                            @foreach ($tagVideos as $video)


                            <div class="live-item">
  
                                <div class="popup-wrpp">
                                    <div class="live_image secOne-image2" style="width: 28%;display:inline-block">
                                        <img src="{{ asset($video->video_image) }}"
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
                                                    @php
                                                    $youtubeUrl = $video->video_url;
                                                    $videoCode = substr(strrchr($youtubeUrl, '='), 1);
                                                     @endphp
                                                        <iframe id="video1" width="auto" height="400px"  class="zoomable" src="https://www.youtube.com/embed/{{ $videoCode }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                   
                                                </div>
                                            </div>
                                            <h4 class="secOne-title2">
                                                <a href=" ">{{ GoogleTranslate::trans($video->video_title,app()->getLocale()) }}
                                                </a>
                                            </h4>
                                            <div class="cat-meta">
                                                <a href=" "> <i class="lar la-newspaper"></i>
                                                    {{ date('d-m-Y',strtotime($video->post_date)) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            

{{--                             <div class="themesBazar-3 themesBazar-m2">
                                <div class="sec-one-wrpp2">
                                    <div class="secOne-news">
                                        <div class="secOne-image2">
                                                  
                                        </div>
                                        
                                    </div>

                                </div>
                            </div> --}}  
                            @endforeach
                            @endif
                            @if(count($tagVideos)  < 1)

                            <div class="container my-5 p-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="alert alert-dark text-center p-3">
                                            <h4 class="alert-heading">Sorry! No Video is Available for The Tag</h4>
                                            <p class="mb-0">Please explore other content or try a different tag.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                                
                            @endif
                      </div>
    
    
    
                        
                     
    
                   
                        </div>



                      {{--   <div class="archive-heading">
                            <h2 class="themesBazar_cat01"> <i class="fa fa-picture-o"></i> Photo Gallery of Tag ({{ $TagName }})
        
                            </h2>
                        </div>
                         --}}
                        <div class="live_title">
                            <a href="javascript:void(0);"><i class="fa fa-picture-o"></i> Photo Gallery of Tag ({{ $TagName }})
          
                              </a> 
                              
                            
                          </div>

                        <div class="sec-one-item2">
                            <div class="row">
                                @if (isset($tagPhotos))
                                @foreach ($tagPhotos as $photo)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="sec-one-wrpp2">
                                        <div class="secOne-news">
                                            <div class="secOne-image2">
                                                <img id="photo1" class="zoomable"
                                                src="{{ asset($photo->photo_gallery) }}" data-zoom-image="{{ asset($photo->photo_gallery) }}">
                                            </div>
                                           
                                        </div>
                                        <div class="cat-meta">
                                            <a href=" "> <i class="lar la-newspaper"></i>
                                                {{ date('d-m-Y',strtotime($photo->post_date)) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>  
                                @endforeach
                                @endif
                                @if(count($tagPhotos)  < 1)
                                
                                <div class="container my-5 p-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="alert text-center p-3" style="background-color: #474d5216">
                                                <h4 class="alert-heading">Sorry! No Photo is Available for The Tag</h4>
                                                <p class="mb-0">Please explore other content or try a different tag.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif
                             
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
                            <img width="700" height="400" src="assets/images/lazy.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
                            <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i>
                            </div>
                        </div>
                        <div class="live-popup">
                            <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles" aria-describedby="modal-contents">
                                <div id="modal-contents">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe class="" src=" " allowfullscreen="allowfullscreen" width="100%" height="400px"></iframe>
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
                    <input type="date" id="wordpress" placeholder="Select Date" autocomplete="off" value="" name="m" required="" class="hasDatepicker">
                    <input type="submit" value="Search">
                </form>
                <div class="recentPopular">
                    <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active" id="recent-tab" data-bs-toggle="pill" data-bs-target="#recent" role="tab" aria-controls="recent" aria-selected="false"> LATEST </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular" role="tab" aria-controls="popular" aria-selected="false"> POPULAR </div>
                        </li>
                    </ul>
                </div>

                

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane active show  fade" id="recent" role="tabpanel" aria-labelledby="recent">
                        <div class="news-titletab">

                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/24/nugygi@mailinator.com"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774583654476349.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/24/nugygi@mailinator.com">nugygi@mailinator.com
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/22/home-textile:-a-new-pathway-to-$100-billion-export-target"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774484456104751.jpeg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/22/home-textile:-a-new-pathway-to-$100-billion-export-target">Home textile: a new pathway to $100 billion export target
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/21/looming-trump-trials-are-throwing-judges-into-an-election-maelstrom"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774476776353405.webp"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/21/looming-trump-trials-are-throwing-judges-into-an-election-maelstrom">Looming Trump trials are throwing judges into an election maelstrom
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/18/england-beat-sweden-to-reach-first-world-cup-semi-final-in-28-years"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774462941951932.webp"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/18/england-beat-sweden-to-reach-first-world-cup-semi-final-in-28-years">England beat Sweden to reach first World Cup semi-final in 28 years
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/7/since-2017-when-yogi-adityanath-took-charge,-over-one-killed-every-fortnight-in-up-police-encounters"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773403179945514.jpeg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/7/since-2017-when-yogi-adityanath-took-charge,-over-one-killed-every-fortnight-in-up-police-encounters">Since 2017 when Yogi Adityanath took charge, over one killed every fortnight in UP police encounters
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/6/man-utd-3-1-rc-lens:-andre-onana-beaten-by-halfway-line-stunner-but-hosts-roar-back-for-victory"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773402631532624.jpg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/6/man-utd-3-1-rc-lens:-andre-onana-beaten-by-halfway-line-stunner-but-hosts-roar-back-for-victory">Man Utd 3-1 RC Lens: Andre Onana beaten by halfway line stunner but hosts roar back for victory
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/2/bangladesh’s-share-in-global-rmg-trade-trebles-in-17-years"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773276141110918.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/2/bangladesh’s-share-in-global-rmg-trade-trebles-in-17-years">Bangladesh’s share in global RMG trade trebles in 17 years
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/1/india-wants-peaceful-polls-in-bangladesh"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774509466114499.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/1/india-wants-peaceful-polls-in-bangladesh">India wants peaceful polls in Bangladesh
                                    </a></h4>
                            </div>
                            


                        </div>
                    </div>
                    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                        <div class="news-titletab">

                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/1/india-wants-peaceful-polls-in-bangladesh"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774509466114499.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/1/india-wants-peaceful-polls-in-bangladesh">India wants peaceful polls in Bangladesh
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/2/bangladesh’s-share-in-global-rmg-trade-trebles-in-17-years"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773276141110918.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/2/bangladesh’s-share-in-global-rmg-trade-trebles-in-17-years">Bangladesh’s share in global RMG trade trebles in 17 years
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/6/man-utd-3-1-rc-lens:-andre-onana-beaten-by-halfway-line-stunner-but-hosts-roar-back-for-victory"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773402631532624.jpg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/6/man-utd-3-1-rc-lens:-andre-onana-beaten-by-halfway-line-stunner-but-hosts-roar-back-for-victory">Man Utd 3-1 RC Lens: Andre Onana beaten by halfway line stunner but hosts roar back for victory
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/7/since-2017-when-yogi-adityanath-took-charge,-over-one-killed-every-fortnight-in-up-police-encounters"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773403179945514.jpeg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/7/since-2017-when-yogi-adityanath-took-charge,-over-one-killed-every-fortnight-in-up-police-encounters">Since 2017 when Yogi Adityanath took charge, over one killed every fortnight in UP police encounters
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/18/england-beat-sweden-to-reach-first-world-cup-semi-final-in-28-years"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774462941951932.webp"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/18/england-beat-sweden-to-reach-first-world-cup-semi-final-in-28-years">England beat Sweden to reach first World Cup semi-final in 28 years
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/21/looming-trump-trials-are-throwing-judges-into-an-election-maelstrom"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774476776353405.webp"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/21/looming-trump-trials-are-throwing-judges-into-an-election-maelstrom">Looming Trump trials are throwing judges into an election maelstrom
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/22/home-textile:-a-new-pathway-to-$100-billion-export-target"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774484456104751.jpeg"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/22/home-textile:-a-new-pathway-to-$100-billion-export-target">Home textile: a new pathway to $100 billion export target
                                    </a></h4>
                            </div>
                                                        <div class="tab-image tab-border">
                                <a href="http://127.0.0.1:8000/news/post/details/24/nugygi@mailinator.com"><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774583654476349.png"></a>
                                <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                <h4 class="tab_hadding"><a href="http://127.0.0.1:8000/news/post/details/24/nugygi@mailinator.com">nugygi@mailinator.com
                                    </a></h4>
                            </div>
                            





                        </div>
                    </div>
                </div>



                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <iframe src=" " width="260" height="170" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <div class="twitter-timeline twitter-timeline-rendered" style="display: flex; width: 410px; max-width: 100%; margin-top: 0px; margin-bottom: 0px;">
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="" style="position: static; visibility: visible; width: 279px; height: 220px; display: block; flex-grow: 1;" title="Twitter Timeline" src=" "></iframe></div>
                    <script async="" src="assets/js/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
</section>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        var $iframe = $('#youtube-iframe');
        var $container = $('.video-container');
        var $zoomButton = $('#zoom-button');

        $zoomButton.click(function() {
            $container.toggleClass('zoomed');
        });

        // Close the zoomed-in video when clicking outside of it
        $(document).click(function(event) {
            if (!$container.is(event.target) && $container.has(event.target).length === 0) {
                $container.removeClass('zoomed');
            }
        });
    });
</script>

@endsection