<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class OnlinePoll extends Model
{
    use HasFactory;
    protected $fillable=['title','vote_for_1','vote_for_2','yes','no','no_opinion'];

    // const LIMIT = 20;

  /*   public function limitWord()
    {
     return   Str::limit($this->title, OnlinePoll::LIMIT);
    } */
}
