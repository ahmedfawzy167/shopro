<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Subcategory extends Model implements Searchable
{
    use SoftDeletes;
    protected $fillable = ['name','image','category_id'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('subcategories.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    use HasFactory;
}
