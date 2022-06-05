<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name',
       'min_age',
       'max_age',
       'distance',
       'start_time',
       'price',
       'status'
   ];

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

    public function scopeSearch($query, $val)
    {
        return $query
         ->where('name', 'like', '%'.$val.'%')
         ->orWhere('min_age', 'like', '%'.$val.'%')
         ->orWhere('max_age', 'like', '%'.$val.'%')
         ->orWhere('distance', 'like', '%'.$val.'%')
         ->orWhere('start_time', 'like', '%'.$val.'%')
         ->orWhere('price', 'like', '%'.$val.'%');
    }
}
