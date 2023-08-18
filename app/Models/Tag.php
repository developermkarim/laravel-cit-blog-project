<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=[];
/**
     * Get all of the posts that are assigned this tag.
     */
    public function newsPost()
    {
        return $this->morphedByMany(NewsPost::class,'taggable');
    }

    public function videoGallary()
    {
        return $this->morphedByMany(VideoGallery::class,'taggable');
    }

    public function photoGallary()
    {
        return $this->morphedByMany(PhotoGallery::class,'taggable');
    }
}
