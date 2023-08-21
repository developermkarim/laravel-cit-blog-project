@extends('frontend.home_dashboard')
@section('home')

@section('title','FAQ')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $about->about_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $about->about_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $about->about_details !!}
            </div>
        </div>
    </div>
</div>

@endsection