<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class Product extends Model
{
    protected $fillable=['title','slug','summary','description','category_id','child_category_id','price','brand_id','discount','status','photo','size','stock','is_featured','condition'];
    protected $primaryKey = 'product_id';
    public function cat_info(){
        return $this->hasOne('App\Models\Category','category_id','category_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','category_id','child_category_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('product_id','desc')->paginate(10);
    }
    public function rel_prods(){
        return $this->hasMany('App\Models\Product','category_id','category_id')->where('status','active')->orderBy('product_id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','product_review_id')->with('user_info')->where('status','active')->orderBy('product_review_id','DESC');
    }
    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

}
