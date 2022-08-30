<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','estado','category_id','bia_process_id'];

    protected $casts = ['estado' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
