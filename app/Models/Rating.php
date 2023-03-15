<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['rating','restaurant_id','customer_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
}
