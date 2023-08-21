@extends('frontend.home_dashboard')
@section('home')

@section('title','FAQ')

{{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
   --}}
   <div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $faq->faq_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ "HOME" }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $faq->faq_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
  
 


<div class="container">
    <div class="row">
        {!! $faq['faq_details'] !!}
    </div>
</div>


    
@endsection