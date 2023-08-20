<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getAllTags()
    {
        $newsPost = NewsPost::find(1);
        $allTags = $newsPost->tags; Tag::all();
         dd($allTags);

    }
}
