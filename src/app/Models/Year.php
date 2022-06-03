<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    /**
     * Get images
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    /**
     * Get marks
     */
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
