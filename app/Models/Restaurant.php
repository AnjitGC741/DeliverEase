<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['restaurantName','restaurantNumber','contactName','contactEmail','city','street','cuisine','service','status','minimumOrder','password','restaurantLogo','restaurantCoverImg'];
}
