<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagegallary extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['restaurantImgs','restaurant_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
