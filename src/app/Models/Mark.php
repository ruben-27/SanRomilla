<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
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
    public function scopeSearch($query, $val)
    {
        return $query
         ->where('name', 'like', '%'.$val.'%')
         ->orWhere('last_name', 'like', '%'.$val.'%')
         ->orWhere('place', 'like', '%'.$val.'%')
         ->orWhere('dorsal', 'like', '%'.$val.'%')
         ->orWhere('gender', 'like', '%'.$val.'%')
         ->orWhere('time', 'like', '%'.$val.'%')
         ->orWhere('pace', 'like', '%'.$val.'%');
    }
}
