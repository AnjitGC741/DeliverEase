<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['foodName','category','foodType','price','quantity','foodImg','restaurant_id'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
