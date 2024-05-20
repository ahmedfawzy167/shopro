<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use SoftDeletes;
    protected $fillable = ['name','description','cost','price','stock','subcategory_id'];

   public function setNameAttribute($value)
   {
      $this->attributes['name'] = strtolower($value);  // Convert The name to Lowercase;
   }

   public function getSearchResult(): SearchResult
   {
       $url = route('products.show', $this->id);

       return new SearchResult(
           $this,
           $this->name,
           $url
       );
   }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function skus()
    {
      return $this->hasMany(Sku::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    use HasFactory;
}
