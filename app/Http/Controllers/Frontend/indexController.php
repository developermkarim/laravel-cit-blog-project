<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class indexController extends Controller
{
    public function Index(){
        
        return view('frontend.index');
    } 
    // End Method 
    public function newsDetails($id,$slug)
    {
        $news = NewsPost::findOrFail($id);

        $tags = $news->tags;
        $tags_all = explode(',',$tags);
        $news_key = 'blog' . $news->id;
        if(!Session::has($news_key)){
            $news->increment('view_count');
            Session::put($news_key,1);
        };

        $latest_posts = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $popular_posts = NewsPost::orderBy('view_count','DESC')->limit(8)->get();
        $related_posts = NewsPost::where('category_id',$news->id)->where('id','!=',$id)->limit(8)->get();

        return view('backend.news.news_details_post',compact('news','tags_all','latest_posts','popular_posts','related_posts'));
    }

    public function cateWiseNews($id,$slug)
    {
        $bread_category = Category::where(['id'=>$id])->first();

        $news = NewsPost::where(['status'=>1])->orderBy('id','DESC')->where(['category_id'=>$id])->get();

        $two_news = NewsPost::where(['status'=>1])->orderBy('id','DESC')->where(['category_id'=>$id])->limit(2)->get();
        
        $latest_posts = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $popular_posts = NewsPost::where('view_count','DESC')->limit(6)->get();

        return view('backend.news.category_news',compact('bread_category','news','latest_posts','popular_posts','two_news'));
    }

    public function subCateWiseNews($id,$status)
    {
        $bread_subcategory = Subcategory::where(['id'=>$id])->first();

        $news = NewsPost::where(['status'=>1])->orderBy('id','DESC')->where(['subcategory_id' => $id])->limit(8)->get();

        $two_news = NewsPost::where(['status' => 1])->where(['subcategory_id' => $id])->orderBy('id','DESC')->limit(2)->get();

        $latest_posts = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $popular_posts = NewsPost::where('view_count','DESC')->limit(8)->get();

        return view('backend.news.subcategory_news',compact('news','bread_subcategory','latest_posts','popular_posts','two_news'));
    }

    public function changeLanguage(Request $request)
    {
        // dd($request);
        App::setLocale($request->lang);
        session()->put('locale',$request->lang);

        return redirect()->back()->with(['message'=>'You have changed language successfully','alert-type'=>'success']);
    }
}
