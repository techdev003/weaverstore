<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function countWishlist($product_id){
        $user = Auth::user();
    
        if ($user) {
            $countWishlist = Wishlist::where(['user_id' => $user->id, 'product_id' => $product_id])->count();
            return $countWishlist;
        } else {
            return 0; // or handle the case when there's no authenticated user
        }
    }
}
