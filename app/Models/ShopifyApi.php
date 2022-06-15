<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Exception;

class ShopifyApi extends Model
{
    use HasFactory;

    protected $table = 'shopifyApi';

    public $timestamps = false;

    protected $fillable = [
        "APIkey",
        "SHOPIFY_DOMAIN",
        "Password",
        "APIversion",
        "protocol"
    ];


    /**
     * Scope a query to only include Change.
     *
     *
     *
     */


    public function scopeChange($query, $request)
    {

        try {
            if ($query->first()->exists()) {
               return  $query->where('SHOPIFY_DOMAIN', $request->shopifyDomen)->pluck('SHOPIFY_DOMAIN')[0];
             }else{
                throw new Exception();
             }
        } catch (Exception $e) {
            print "ShopifyApi not exists";
        }
    }
}
