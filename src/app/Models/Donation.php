<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'name',
       'last_name',
       'amount',
       'size',
   ];

   public function scopeSearch($query, $val)
   {
       return $query
        ->where('name', 'like', '%'.$val.'%')
        ->orWhere('last_name', 'like', '%'.$val.'%')
        ->orWhere('amount', 'like', '%'.$val.'%')
        ->orWhere('size', 'like', '%'.$val.'%');
   }
}