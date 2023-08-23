@extends('frontend.home_dashboard')
@section('home')

@section('title', 'News24 | Search News')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ "SEARCH_RESULT" }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ "SEARCH_RESULT" }}</li>
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



                <div class="sec-one-item2">
                    <div class="row">
                        
                        @foreach ($newsPosts as $news)
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload"
                                                src="{{ asset($news->image) }}"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">{{ GoogleTranslate::trans($news->news_title,app()->getLocale()) }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        {{ date('d-m-Y',strtotime($news->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>  
                        @endforeach

                      {{--   <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773276141110918.png"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">Bangladesh’s share in global RMG trade trebles in 17 years
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        04-08-2023
                                    </a>
                                </div>
                            </div>
                        </div>
                        

                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1773403179945514.jpeg"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">Since 2017 when Yogi Adityanath took charge, over one killed every fortnight in UP police encounters
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        18-08-2023
                                    </a>
                                </div>
                            </div>
                        </div>
                        

                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774462941951932.webp"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">England beat Sweden to reach first World Cup semi-final in 28 years
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        17-08-2023
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="sec-one-wrpp2">
                                <div class="secOne-news">
                                    <div class="secOne-image2">
                                        <a href=" "><img class="lazyload" src="http://127.0.0.1:8000/upload/news/1774462941951932.webp"></a>
                                    </div>
                                    <h4 class="secOne-title2">
                                        <a href=" ">England beat Sweden to reach first World Cup semi-final in 28 years
                                        </a>
                                    </h4>
                                </div>
                                <div class="cat-meta">
                                    <a href=" "> <i class="lar la-newspaper"></i>
                                        17-08-2023
                                    </a>
                                </div>
                            </div>
                        </div>
                         --}}


                         


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
@endsection