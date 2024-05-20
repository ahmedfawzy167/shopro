<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Sku extends Model implements Searchable
{
    use SoftDeletes;
    protected $fillable =['name','product_id'];

    public function images()
    {
       return $this->morphMany(Image::class,'imageable');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('skus.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }



    use HasFactory;
}
