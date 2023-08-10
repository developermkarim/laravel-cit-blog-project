<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsComment as Comment;
use App\Models\NewsComment;
use App\Models\NewsPost;
use App\Models\User;
use App\Notifications\Notification\NewCommentNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NewsCommentController extends Controller
{
 
   public function storeReview(Request $request)
   {
     $user = User::where('role','admin')->get();

     $request->validate([
        'content'=>'required'
     ]);

     NewsComment::insert([
        'news_id'=>$request->news_id,
        'user_id'=>Auth::id(),
        'comment'=>$request->content,
        'created_at'=> Carbon::now()
     ]);

     /* News of what for notice set */
    //  $news = NewsPost::where('id',$request->news_id)->first();
     Notification::send($user,new NewCommentNotification($request));
     return back()->with("status","Review Will Approve By Admin");

   }

   public function pendingReview()
   {
     $review = NewsComment::where(['status'=>'0'])->orderBy('id','DESC')->get();
    //  dd($review);
    // status value must be enclosed with string like '0' or '1'('1' is optional)
     return view('backend.review.pending_review',compact('review'));
   }

   public function ReviewApprove($id)
   {
     $review = NewsComment::where('id',$id)->update(['status'=>1]);
     if($review){
        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
     }

   }

   public function ApproveReview(){

    
    $review = NewsComment::where('status',1)->orderBy('id','DESC')->get();
    return view('backend.review.approve_review',compact('review'));

}// End Method

public function DeleteReview($id){

    NewsComment::findOrFail($id)->delete();

     $notification = array(
        'message' => 'Review Deleted Successfully',
        'alert-type' => 'success'

    );

    return redirect()->back()->with($notification);


}// End Method
   
} 

