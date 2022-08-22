<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','valor','bia_process_id','estado'];
    protected $casts = ['estado' => 'boolean'];
}
