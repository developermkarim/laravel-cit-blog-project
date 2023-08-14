<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPage()
    {
        $aboutText = Page::where(['about_status'=>'1']);
        return view('backend.common-pages.about',compact('aboutText'));
    }
}
