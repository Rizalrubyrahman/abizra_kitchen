<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable=['title','slug','status'];
    protected $primaryKey = 'post_tag_id';
}
