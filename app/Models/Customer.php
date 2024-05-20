<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = ['name','phone','address','city_id'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    use HasFactory;
}
