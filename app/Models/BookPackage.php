<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPackage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function packages(){
        return $this->belongsTo(Package::class, 'package_id');
    }

}
