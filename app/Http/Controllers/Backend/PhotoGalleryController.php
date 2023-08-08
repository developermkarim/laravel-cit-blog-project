<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
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

                PhotoGallery::insert([
                    'photo_gallery'=>$save_url,
                    'post_date'=>Carbon::now()->format('D F Y'),
                ]);
            }
         
            $notification = array(
                'message' => 'Photo Gallery Inserted Successfully',
                'alert-type' => 'success'
    
            );
            return redirect()->route('all.photo.gallery')->with($notification);
        }
     /*    $image = $request->file('multi_image');

        foreach($image as $mulit_image){
 
        $name_gen = hexdec(uniqid()).'.'.$mulit_image->getClientOriginalExtension();
        Image::make($mulit_image)->resize(700,400)->save('upload/multi/'.$name_gen);
        $save_url = 'upload/multi/'.$name_gen;
        
        PhotoGallery::insert([
            'photo_gallery' => $save_url,
            'post_date' => Carbon::now()->format('d F Y'),

        ]); 
        } // End Foreach
 */
       

    }// End Method 



   /*  public function EditPhotoGallery($id){

        $photogallery = PhotoGallery::findOrFail($id);
        return view('backend.photo.edit_photo',compact('photogallery'));

    }// End Method  */
    public function EditPhotGallary($id)
    {
        $photogallery = PhotoGallery::finrOrFail($id);
        return view('backend.photo.edit_photo',compact('photogallery'));
    }


    public function UpdatePhotoGallery(Request $request){
        $photo_id = $request->id;

        if ($request->file('multi_image')) {
            
    $image = $request->file('multi_image'); 
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(700,400)->save('upload/multi/'.$name_gen);
    $save_url = 'upload/multi/'.$name_gen;
        
        PhotoGallery::findOrFail($photo_id)->update([
            'photo_gallery' => $save_url,
            'post_date' => Carbon::now()->format('d F Y'),

        ]); 

        $notification = array(
            'message' => 'Photo Gallery Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.photo.gallery')->with($notification); 

        } // End If 

    }// End Method 


    public function DeletePhotoGallery($id){

        $photo = PhotoGallery::findOrFail($id);
        $img = $photo->photo_gallery;
        unlink($img);

        PhotoGallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Photo Gallery Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification); 


    }// End Method 



}
 