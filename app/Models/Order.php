<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['user_id','sku_id','date','total'];

    public function statuses() {

        return $this->belongsToMany(Status::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sku(){
        return $this->belongsTo(Sku::class);
    }


    use HasFactory;
}
