<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
