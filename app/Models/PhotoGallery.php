<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class PhotoGallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tags() // This MorphToMany is to get all tags that is assigned for PhotoGallery' data.
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

}
