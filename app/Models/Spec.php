<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable =['name','spec_category_id'];

    public function specCategory()
    {
        return $this->belongsTo(SpecCategory::class);
    }
    use HasFactory;
}
