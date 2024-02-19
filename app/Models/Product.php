<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description', 'cost', 'price', 'stock', 'sub_category_id'];
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    use HasFactory;
}
