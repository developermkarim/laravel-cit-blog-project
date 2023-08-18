<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{
    public function AllNewsPost(){

        $allnews = NewsPost::latest()->get();
        return view('backend.news.all_news_post',compact('allnews'));
    } //

    public function AddNewsPost(){
         
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role','admin')->latest()->get();
       return view('backend.news.add_news_post',compact('categories','subcategories','adminuser'));

   } // End Method

   
    public function storeNewsPost(Request $request){
         
        if($request->hasFile('image')){
            $image = $request->file('image');
        
        $originalImage = hexdec(uniqid()) . '.' . strtolower($request->file('image')->getClientOriginalExtension());

        Image::make($image)->resize(784,436)->save('upload/news/' . $originalImage);

        $save_url = 'upload/news/' . $originalImage;

        }
        else{
            $save_url = 'upload/' . 'no_image.jpg';
        }
        
        // dd($save_url);
        // dd($request->tags);
      $newsSaved =   NewsPost::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),

            'news_details' => $request->news_details,

            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,

            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_url,
            'created_at' => Carbon::now(),  
        ]);

        //  dd($isSaved);
       /* NewsPost Tag Inserted to this Here */
       
    //    $isSaved->tags->attach([1,2]);

    $tags = explode(',', $request->input('tags'));

    foreach ($tags as $tagName) {
        $tag = Tag::insertGetId(['name' => $tagName]);
        $newsSaved->tags()->attach($tag);
    }

        if($newsSaved){
            /* NewsPost Tag Inserted to this Here */

            $notification = [
                'message'=>'News Post successfully saved',
                'alert-type'=>'info'
            ];
            return redirect()->route('all.news.post')->with($notification);
        }
   }// End Method


   public function editNewsPost($id)
   {
     $categories = Category::latest()->get();
     
     $subcategories = Subcategory::orderBy('subcategory_name','ASC')->get();
     $adminuser = User::where('role','admin')->latest()->get();
    $newsPost = NewsPost::findOrFail($id);
    // $tags =  Tag::all();
    $existingTags = $newsPost->tags()->pluck('name')->implode(',');
    //   dd($existingTags);
     return view('backend.news.edit_news_post',compact('categories','subcategories','adminuser','newsPost','existingTags'));

   }

   public function updateNewsPost(Request $request)
   {
     $newsPost = NewsPost::findOrFail($request->id);
    //  dd($newsPost);
    if($request->hasFile('image')){
       $newsPost->image ? unlink($newsPost->image) : '';
     $image = $request->file('image');
        
    $originalImage = hexdec(uniqid()) . '.' . strtolower($request->file('image')->getClientOriginalExtension());

    Image::make($image)->resize(784,436)->save('upload/news/' . $originalImage);

    $save_url = 'upload/news/' . $originalImage;

}else{
    $save_url = $newsPost->image;
}

$isUpdate =   NewsPost::where(['id'=>$request->id])->update([
    'category_id' => $request->category_id,
    'subcategory_id' => $request->subcategory_id,
    'user_id' => $request->user_id,
    'news_title' => $request->news_title,
    'news_title_slug' => strtolower(str_replace(' ','-',$request->news_title)),

    'news_details' => $request->news_details,
    // 'tags' => $request->tags,

    'breaking_news' => $request->breaking_news,
    'top_slider' => $request->top_slider,
    'first_section_three' => $request->first_section_three,
    'first_section_nine' => $request->first_section_nine,

    'post_date' => date('d-m-Y'),
    'post_month' => date('F'),
    'image' => $save_url,
    'created_at' => Carbon::now(),  
]);

$tags = explode(',',$request->tags);
$tagIds = [];
foreach ($tags as $key => $value) {
    $tag = Tag::firstOrCreate(['name'=>trim($value)]);
    $tagIds[] = $tag->id;
}
$newsPost->tags()->sync($tagIds);
// delete tags which news is associated with tag
Tag::has('newsPost','=',0)->delete(); 

// dd($isUpdate);
if($isUpdate===1){
    $notification = [
        'message'=>'News Post  successfully Updated',
        'alert-type'=>'info'
    ];
    return redirect()->route('all.news.post')->with($notification);
}

}

public function deleteNewsPost($id)
{
    $newsPost = NewsPost::findOrFail($id);
    // dd($newsPost);
    $$prev_tags_id = $newsPost->tags->pluck('id')->toArray();

    $imageUrl = $newsPost->image;
    $imageArr = explode('/',$imageUrl);
    $image = $imageArr[count($imageArr) - 1];
   
    if($newsPost->image != null && $newsPost->image == 'upload/news/' .  $image){
        unlink($newsPost->image);
    }
    /* Delete Related Tags */

    $newsPost->tags()->detach();
    
    if($newsPost->delete()){
    // Deleting the related tags with no tag is associated with deletable news 
    Tag::whereId('id',$prev_tags_id)->has('newsPost','=',0)->delete();
        $notification = [
            'message'=>'News Post Successfully Deleted',
            'alert-type'=> 'success'
        ];

        return redirect()->back()->with($notification);
    }
}

public function activeNewsPost($id)
{
    $newsPost = NewsPost::where('id',$id)->update(['status'=>1]);

    if($newsPost ===1){

        $notification = [
        'message'=>'News Post activated',
        'alert-type'=>'info'
        ];

        return redirect('/all/news/post')->with($notification);
    }

}

public function inactiveNewsPost($id)
{
    $inactivate = NewsPost::where('id',$id)->update(['status'=>0]);

    if($inactivate){
        $notification = [
            'message'=>'News Post activated',
            'alert-type'=>'info'
        ];

        return redirect('/all/news/post')->with($notification);
    }
}

}
