<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = ['customerName','email','password','img'];
    public function ratings()
    {
    return $this->hasMany(Rating::class);
    }
    public function my_carts()
    {
    return $this->hasMany(MyCart::class);
    }
    public function order__details()
    {
    return $this->hasMany(Order_Detail::class);
    }
    public function order_food()
    {
    return $this->hasMany(OrderFood::class);
    }
}
