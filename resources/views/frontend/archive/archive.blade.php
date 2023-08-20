@extends('frontend.home_dashboard')
@section('home')

@section('title','archive news')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ "ALL_POSTS_OF" }} {{ $updated_date }}</h2>
            <nav class="breadcrumb-container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                    <li class="breadcrumb-item">{{ "ARCHIVE" }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $updated_date }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        @if (count($newsPosts))
            
        @foreach($newsPosts as $item)
        <div class="col-lg-6 col-md-6">
            <div class="bg2">
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
                                <div class="date-user d-flex justify-between">
                                    <div class="user">
                                         
                                    <span> <i class="fa fa-user" aria-hidden="true"></i>{{ $item->user->name }}</span>
                                    </div>
                                  <div class="date">
                                    
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>{{ $item->updated_at->format('D-M-Y') }}</span>
                                  </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        @endforeach
        @else
        <span class="text-danger">{{ "NO_POST_FOUND" }}</span>
        @endif
        
        <div class="col-md-12 my-5 text-center">
            {{ $newsPosts->links() }}
        </div>

    </div>
</div>
@endsection