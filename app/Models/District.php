<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function countries(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

}
