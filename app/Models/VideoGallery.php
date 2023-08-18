<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;
    protected $guarded=[];

     /**
     * Get all of the VideoGallery that are assigned this tag.
     */

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
