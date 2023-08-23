<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function Index(){

        $latest_posts = NewsPost::orderBy('id','DESC')->limit(8)->get();
        $popular_posts = NewsPost::orderBy('view_count','DESC')->limit(8)->get();
        
        $skip_cat_0 = Category::skip(0)->first();
        
        $skip_news_0 = NewsPost::where('status',1)->where('category_id',$skip_cat_0->id)->orderBy('id','DESC')->limit(5)->get();

        $skip_cat_2 = Category::skip(2)->first();
        $skip_news_2 = NewsPost::where('status',1)->where('category_id',$skip_cat_2->id)->orderBy('id','DESC')->limit(6)->get();

        $skip_cat_1 = Category::skip(1)->first();
        $skip_news_1 = NewsPost::where('status',1)->where('category_id',$skip_cat_1->id)->orderBy('id','DESC')->limit(3)->get();

        $skip_cat_4 = Category::skip(4)->first();
        $skip_news_4 = NewsPost::where('status',1)->where('category_id',$skip_cat_4->id)->orderBy('id','DESC')->limit(5)->get();


        return view('frontend.index',compact('latest_posts','popular_posts','skip_cat_0','skip_news_0','skip_cat_2','skip_news_2','skip_cat_1','skip_news_1','skip_cat_4','skip_news_4'));
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

    public function reporterWiseNews($id)
    {
        $reporter = User::findOrFail($id);

        $news = NewsPost::where(['user_id'=>$id])->get();
        return view('backend.reporter.reporter_news_post',compact('reporter','news'));
    }


    public function GetSubCategory($category_id){

        /*    $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get(); */
        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
   
       }// End Mehtod 

    /* Index Page Category Wise Subcategory for select combo box */

    public function GetNewsBySeach(Request $request)
    {
       
  /*       $newsPosts = NewsPost::where(['category_id'=>1])->orWhere(['subcategory_id'=>1])->where('news_title','LIKE',"%$request->search_key%")->get(); */
        $newsPosts = NewsPost::with('subcategory')->orderBy('id','DESC');
        if($request->text_item!=''){
            $newsPosts = $newsPosts->where('news_title','LIKE','%'.$request->text_item.'%');
        }
        if($request->subcategory_id!=''){
            $newsPosts = $newsPosts->where('subcategory_id',$request->subcategory_id);
        }
if($request->category_id!=''){
    $newsPosts = $newsPosts->whereHas('subcategory.category',function($query) use ($request){
        $query->where('category_id',$request->category_id);
    });
}
        $newsPosts = $newsPosts->paginate(12);
        //  dd($newsPosts);
        return view('frontend.search.search',compact('newsPosts'));
        
    }

    /* Tag Wise all News Videos and Photos */
    public function TagNewsVideosPhotos($tagName)
    {
        // $tags = Tag::with('newsPost','videoGallery','photoGallery')->where('name',$tagName)->get();
       
        $tag = Tag::where('name',$tagName)->firstOrFail();
        // dd($tag->photoGallary);
        $tagVideos = $tag->videoGallary()->with('tags')->get();
        $tagPhotos = $tag->photoGallary()->with('tags')->get();
        $tagNews = $tag->newsPost()->with('tags')->get();
        return view('frontend.tag.tag-wise-news-video-photo',compact('tagVideos','tagPhotos','tagNews'));
    }
}
