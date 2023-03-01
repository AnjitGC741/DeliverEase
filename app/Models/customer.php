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
    public function orderdetails()
    {
    return $this->hasMany(Orderdetail::class);
    }
    public function orderfoods()
    {
    return $this->hasMany(Orderfood::class);
    }
}
