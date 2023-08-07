<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['category_name','category_slug'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function newsPost()
    {
        return $this->hasMany(NewsPost::class);
    }
}
