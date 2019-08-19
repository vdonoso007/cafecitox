<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order', 'product', 'quantity', 'price', 'subtotal', 'status'];
}
