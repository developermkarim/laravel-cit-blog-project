<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Tag;
use Carbon\Carbon;
use Faker\Provider\bg_BG\PhoneNumber;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    public function AllPhotoGallery(){

        $photo = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo',compact('photo'));

    } // End Method 


    public function AddPhotoGallery(){
        return view('backend.photo.add_photo');
    }// End Method 


    public function StorePhotoGallery(Request $request){

        if($request->hasFile('multi_image')){
            $multi_images = $request->file('multi_image');

            foreach($multi_images as $image){

                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(700,400)->save('upload/multi/' . $name_gen);

                $save_url = 'upload/multi/' . $name_gen;

               $gallery = PhotoGallery::create([
                    'photo_gallery'=>$save_url,
                    'post_date'=>Carbon::now()->format('D F Y'),
                ]);

                $tags = explode(',', $request->input('tags'));

                foreach ($tags as $tagName) {
                    $tag = Tag::insertGetId(['name' => $tagName]);
                    $gallery->tags()->attach($tag);
                }

                // dd($gallery);

            }

         
            $notification = array(
                'message' => 'Photo Gallery Inserted Successfully',
                'alert-type' => 'success'
    
            );
            return redirect()->route('all.photo.gallery')->with($notification);
        }

    }// End Method 

    public function EditPhotoGallery($id)
    {
        $photogallery = PhotoGallery::findOrFail($id);
        $existingTags = $photogallery->tags()->pluck('name')->implode(',');
        // dd($existingTags);
        return view('backend.photo.edit_photo',compact('photogallery','existingTags'));
    }


    public function UpdatePhotoGallery(Request $request){
        $photo_id = $request->id;
       $photogallery = PhotoGallery::findOrFail($photo_id);
       $prev_tags = $photogallery->tags->pluck('id')->toArray();
        if ($request->file('multi_image')) {
            
    $image = $request->file('multi_image'); 
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(700,400)->save('upload/multi/'.$name_gen);
    $save_url = 'upload/multi/'.$name_gen;
        
        PhotoGallery::findOrFail($photo_id)->update([
            'photo_gallery' => $save_url,
            'post_date' => Carbon::now()->format('d F Y'),

        ]); 

    } // End If 
                $tags = explode(',', $request->input('tags'));
                $tagID=[];
                foreach ($tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagID[]=$tag->id;
                }

                $photogallery->tags()->sync($tagID);

            // Delete tags with no associations photogallery data
                 // Delete tags with no associations
                 Tag::whereIn('id',$prev_tags)->has('photoGallary','=',0)->delete();

        $notification = array(
            'message' => 'Photo Gallery Updated Successfully',
            'alert-type' => 'success'

        );
     
    return redirect()->route('all.photo.gallery')->with($notification); 

    }// End Method 


    public function DeletePhotoGallery($id){

        $photo = PhotoGallery::findOrFail($id);
        $tagIds = $photo->tags->
        pluck('id')->toArray();
        $img = $photo->photo_gallery;
        unlink($img);

        $photo->tags()->detach();

        // dd($tagIds);
        PhotoGallery::findOrFail($id)->delete();

         // Delete tags with no associations
         Tag::whereIn('id',$tagIds)->has('photoGallary','=',0)->delete();

        $notification = array(
            'message' => 'Photo Gallery Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification); 

    }// End Method 

}
 