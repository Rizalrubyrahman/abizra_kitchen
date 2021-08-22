<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable=['user_id','post_id','comment','replied_comment','parent_id','status'];
    protected $primaryKey = 'post_comment_id';
    public function user_info(){
        return $this->hasOne('App\User','user_id','user_id');
    }
    public static function getAllComments(){
        return PostComment::with('user_info')->paginate(10);
    }

    public static function getAllUserComments(){
        return PostComment::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(PostComment::class,'parent_id')->where('status','active');
    }
}
