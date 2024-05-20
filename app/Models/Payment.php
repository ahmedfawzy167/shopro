<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id','amount','date','payment_method','status'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
