<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Shipping extends Model
{
    protected $fillable=['type','price','status'];
    protected $primaryKey = 'shipping_id';
}
