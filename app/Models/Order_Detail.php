<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $fillable = ['customerName','contactNumber','streetName','cityName','organization','direction','serviceDate1','serviceDate2','serviceTime','serviceType','paymentOption','instruction','restaurant_id','customer_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
    public function order_food()
    {
    return $this->hasMany(OrderFood::class);
    }
}

