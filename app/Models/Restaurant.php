<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['restaurantName','restaurantNumber','contactName','contactEmail','city','street','cuisine','service','status','minimumOrder','password','restaurantLogo','restaurantCoverImg'];
    public function food()
    {
        return $this->hasMany(Food::class);
    }
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

