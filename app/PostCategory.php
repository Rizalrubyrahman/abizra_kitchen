<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class PostCategory extends Model
{
    protected $fillable=['title','slug','status'];
    protected $primaryKey = 'post_category_id';

    public function post(){
        return $this->hasMany('App\Models\Post','post_category_id','post_id')->where('status','active');
    }

    public static function getBlogByCategory($slug){
        return PostCategory::with('post')->where('slug',$slug)->first();
    }
}
