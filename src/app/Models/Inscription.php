<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    
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
         ->where('inscriptions.name', 'like', '%'.$val.'%')
         ->orWhere('last_name', 'like', '%'.$val.'%')
         ->orWhere('dni', 'like', '%'.$val.'%')
         ->orWhere('email', 'like', '%'.$val.'%')
         ->orWhere('birthday', 'like', '%'.$val.'%')
         ->orWhere('gender', 'like', '%'.$val.'%')
         ->orWhere('phone', 'like', '%'.$val.'%')
         ->orWhere('amount', 'like', '%'.$val.'%')
         ->orWhere('size', 'like', '%'.$val.'%')
         ->orWhere('dorsal', 'like', '%'.$val.'%')
         ->orWhere('category_id', 'like', '%'.$val.'%')
         ->orwhere('categories.name', 'like', '%'.$val.'%');
    }
}
