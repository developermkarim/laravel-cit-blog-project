<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function SelectArchive(Request $request)
    {
       
        $date_time = explode('-',$request->archive_month_year);
        $month = $date_time[0];
        $year = $date_time[1];
        return redirect()->route('archive.details',[$month,$year]);
    }

    public function ArchiveDetails($month,$year)
    {
        $newsPosts = NewsPost::with('subcategory')->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->paginate(12);
        foreach ($newsPosts as $key => $value) {
           $updated_date  = date('F M',strtotime($value->created_at));
        }
     return view('frontend.archive.archive',compact('newsPosts','updated_date'));
    }

}
