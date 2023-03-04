<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    protected $fillable = ['foodQuantity','foodPrice','foodName','foodType','total','cartFoodImg','restaurant_id','customer_id','food_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
