<div class="top-scroll-section5">
<div class="container">
<div class="alert" role="alert">
<div class="scroll-section5">
<div class="row">
<div class="col-md-12 top_scroll2">
<div class="scroll5-left">
<div id="scroll5-left">
<span> {{ GoogleTranslate::trans('Breaking News',app()->getLocale()) }} :: </span>
</div>
</div>
<div class="scroll5-right">
<marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">
    @php
        $breaking_news = App\Models\NewsPost::orderBy('id','DESC')->where(['status'=>1])->where(['breaking_news'=>1])->limit(8)->get();

        // dd($breaking_news);
    @endphp

    @foreach ($breaking_news as $news)
    
<a href="{{ url('news/details/' . $news->id . '/' . $news->news_title_slug) }}">
<img src="{{ asset($news->image) }}" alt="Logo" title="Logo" width="30px" height="auto">

{{ GoogleTranslate::trans($news->news_title,app()->getLocale()) }} 
</a>

@endforeach
</marquee>
</div>
<div class="scroolbar5">
<button data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>