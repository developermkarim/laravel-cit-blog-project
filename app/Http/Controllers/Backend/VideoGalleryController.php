<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoGallery;
use Carbon\Carbon; 
use Intervention\Image\Facades\Image;

use App\Models\LiveTv;
use App\Models\Tag;

class VideoGalleryController extends Controller
{
    public function AllVideoGallery(){

        $video = VideoGallery::latest()->get();
        return view('backend.video.all_video',compact('video'));

    } // End Method 


    public function AddVideoGallery(){
        return view('backend.video.add_video');
    } // End Method 


   public function StoreVideoGallery(Request $request){

        $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);
        $save_url = 'upload/video/'.$name_gen;

      $videoGallery =  VideoGallery::create([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,  
            'post_date' => Carbon::now()->format('d F Y'),
            'video_image' => $save_url, 

        ]);

        $tags = explode(',',$request->input('tags'));
        $tagIds = [];
        foreach ($tags as  $tag) {
            $storeTag = Tag::firstOrCreate(['name'=>trim($tag)]);
            $tagIds[] = $storeTag->id;
        }
        $videoGallery->tags()->attach($tagIds);

         $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.video.gallery')->with($notification);


    }// End Method



    public function EditVideoGallery($id){

        $video = VideoGallery::findOrFail($id);
        $existing_tags = $video->tags->pluck('name')->implode(',');
        // dd($existing_tags);
        return view('backend.video.edit_video',compact('video','existing_tags'));

    }// End Method


    public function UpdateVideoGallery(Request $request){

        $video_id = $request->id;
        $videoImage = VideoGallery::findOrFail($video_id);
        $prev_tags = $videoImage->tags->pluck('id')->toArray();
        if ($request->file('video_image')) {

        unlink($videoImage->video_image);

        $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);
        $save_url = 'upload/video/'.$name_gen;

        VideoGallery::findOrFail($video_id)->update([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,  
            'post_date' => Carbon::now()->format('d F Y'),
            'video_image' => $save_url, 

        ]);

      

         $notification = array(
            'message' => 'Video Update With Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.video.gallery')->with($notification);

        } else{

            VideoGallery::findOrFail($video_id)->update([

            'video_title' => $request->video_title,
            'video_url' => $request->video_url,  
            'post_date' => Carbon::now()->format('d F Y'), 

        ]);

        //    $videoImage->tags()->detach();
          $tags = explode(',', $request->input('tags'));
          $tagID=[];
          foreach ($tags as $tagName) {
              $tag = Tag::firstOrCreate(['name' => $tagName]);
              $tagID[]=$tag->id;
          };
  
          $videoImage->tags()->sync($tagID);
          // Delete the tag that is associated with video image
          Tag::whereIn('id',$prev_tags)->has('videoGallary','=',0)->delete();

         $notification = array(
            'message' => 'Video Update Without Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.video.gallery')->with($notification);

        }

    }// End Method


     public function DeleteVideoGallery($id){

        $photo = VideoGallery::findOrFail($id);
        $tagIds = $photo->tags->pluck('id')->toArray();
        $img = $photo->video_image;
        unlink($img);

        $photo->tags()->detach();
        VideoGallery::findOrFail($id)->delete();

        Tag::whereIn('id',$tagIds)->has('videoGallary','=',0)->delete();

        $notification = array(
            'message' => 'Video Gallery Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification); 

    }// End Method 

/////////////////// Live TV Method ////////////////
    public function UpdateLiveTv(){
        $live = LiveTv::findOrFail(1);

        return view('backend.video.live_tv',compact('live'));

    }// End Method 

     public function UpdateLiveData(Request $request){

        $live_id = $request->id;
        $old_image = LiveTv::findOrFail($live_id);
        if ($request->file('live_image')) {

            @unlink($old_image->live_image);

        $image = $request->file('live_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(784,436)->save('upload/live/'.$name_gen);
        $save_url = 'upload/live/'.$name_gen;

    }else{

        
        $save_url = $old_image->live_image;
    }
        LiveTv::findOrFail($live_id)->update([

            'live_url' => $request->live_url,   
            'post_date' => Carbon::now()->format('d F Y'),
            'live_image' => $save_url, 

        ]);

         $notification = array(
            'message' => 'Live Tv Update With Image Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

       

    }// End Method


}
 