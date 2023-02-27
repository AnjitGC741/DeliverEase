<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;
    protected $fillable = ['orderFoodQuantity','orderFoodPrice','orderFoodName','orderTotal','orderFoodImg','restaurant_id','customer_id','order_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
    public function order__details()
    {
        return $this->belongsTo(Order_Detail::class);
    }
}           
