<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Category extends Model implements Searchable
{
    use SoftDeletes;
    protected $fillable = ['name'];
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function getSearchResult(): SearchResult
   {
       $url = route('categories.show', $this->id);

       return new SearchResult(
           $this,
           $this->name,
           $url
       );
   }

    use HasFactory;
}
