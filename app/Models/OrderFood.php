<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderfood extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['orderFoodQuantity','orderFoodPrice','orderFoodName','orderFoodType','orderTotal','orderFoodImg','restaurant_id','customer_id','orderdetail_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
    public function orderdetails()
    {
        return $this->belongsTo(Orderdetail::class);
    }
}
