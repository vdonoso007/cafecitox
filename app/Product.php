<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'name', 'description', 'group_id', 'price', 'stock', 'image', 'enabled'];
}
