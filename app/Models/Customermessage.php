<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customermessage extends Model
{
    use HasFactory;
    protected $fillable = ['customerMsg','restaurant_id','customer_id'];
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function customers()
    {
        return $this->belongsTo(customer::class);
    }
}
