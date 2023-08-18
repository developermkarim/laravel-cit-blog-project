<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class OnlinePollController extends Controller
{
    public function OnlinePollValidation($requestForm)
    {
      return   $requestForm->validate([
            'title'=>'required|unique:online_polls,title,' . $requestForm->poll_id ,
            
        ],[
            'title.required'=> 'title must be filled up',
            'title.unique'=>'The title already Exist, Try with another name'
        ],
    );
    }

    public function Allpoll(){

        $polls = OnlinePoll::all();

/*         if($polls){
            $poll_title
        } */
        return view('backend.voting.all_poll',compact('polls'));
        
        } // End Method 
        
        
        public function Addpoll(){

        return view('backend.voting.add_poll');

        }// End Method 

        public function Storepoll(Request $request){
        
        $this->OnlinePollValidation($request);
        
        $OnlinePoll = new OnlinePoll();
        
        $OnlinePoll->title = $request->title;
        if($OnlinePoll->save()){
            $notification = array(
                'message' => 'OnlinePoll Inserted Successfully',
                'alert-type' => 'success'
        
            );
            return redirect()->route('all.poll')->with($notification);  
        }
        
        }// End Method 
        
        public function Editpoll($id){
        
        $poll = OnlinePoll::findOrFail($id);
        return view('backend.voting.add_poll',compact('poll'));
        
        }// End Method
        
        
        public function Updatepoll(Request $request){
        
        $this->OnlinePollValidation($request);
        
        $OnlinePoll_id = $request->poll_id;
        
         OnlinePoll::findOrFail($OnlinePoll_id)->update([
            'title' => $request->title, 
        ]);
        
        $notification = array(
            'message' => 'OnlinePoll Updated Successfully',
            'alert-type' => 'success'
        
        );
        return redirect()->route('all.poll')->with($notification);  
        
        }// End Method
        
        public function Deletepoll($id){
        
        OnlinePoll::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'OnlinePoll Deleted Successfully',
            'alert-type' => 'success'
        
        );
        return redirect()->back()->with($notification);  
        
        }// End Method

        public function VoteYesNoUpdateResult(Request $request)
        {
            // $vote_result = $request->result;
            // dd($vote_result);
            $vote_data = OnlinePoll::where(['id'=>$request->vote_id])->first();
            if($request->result == 'yes'){
                $vote_data->yes = $vote_data->yes + 1;
            }elseif($request->result == 'no'){
                $vote_data->no = $vote_data->no + 1;
            }elseif($request->result == 'no_opinion'){
                $vote_data->no_opinion = $vote_data->no_opinion + 1;
            }
            if ($vote_data->update()) {
                session()->put('current_poll_id',$vote_data->id);
                $notification=[
                    'message'=>"you have $request->result votted successfully",
                    'alert-type'=>'success',
                ];

                return redirect()->back()->with($notification);
            }
            
        }
        
        
}
