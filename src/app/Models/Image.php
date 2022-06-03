<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Get year
     */
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    
    /**
     * Get category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
