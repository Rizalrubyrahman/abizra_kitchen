<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable=['user_id','product_id','rate','review','status'];
    protected $primaryKey = 'product_review_id';
    public function user_info(){
        return $this->hasOne('App\User','user_id','user_id');
    }

    public static function getAllReview(){
        return ProductReview::with('user_info')->paginate(10);
    }
    public static function getAllUserReview(){
        return ProductReview::where('user_id',auth()->user()->user_id)->with('user_info')->paginate(10);
    }

}
