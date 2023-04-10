<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = ['customerName','contactNumber','streetName','cityName','organization','direction','serviceDate','serviceTime','serviceType','paymentOption','reason','instruction','restaurant_id','customer_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
    public function orderfoods()
    {
    return $this->hasMany(Orderfood::class);
    }
}
