<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['short_des','description','photo','address','phone','email','logo'];
    protected $primaryKey = 'setting_id';
}