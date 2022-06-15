<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Exception;

class GoogleApi extends Model
{
    use HasFactory;

    protected $table = 'googleApi';

    public $timestamps = false;

    protected $fillable = [
        "view_id",
        "service_account_credentials_json"
    ];

    /**
     * Scope a query to only include Change.
     *
     *
     *
     */
    public function scopeGoogleConfigSet($query)
    {
        try {
            if ($query->first()->exists() && ApiChoose::first()->exists()) {
                $googleApi = $query->where('shopify_domen',ApiChoose::pluck('domen')[0])->first();
             Config::set([
                  "analytics.view_id" => $googleApi->view_id ?? "",
                  "analytics.service_account_credentials_json" => storage_path($googleApi->service_account_credentials_json) ?? "",
             ]);
             }else if ($query->first()->exists()) {
                $googleApi = $query->first();
                Config::set([
                     "analytics.view_id" => $googleApi->view_id ?? "",
                     "analytics.service_account_credentials_json" => storage_path($googleApi->service_account_credentials_json) ?? "",
                ]);
             }else{
                throw new Exception();
             }
        } catch (Exception $e) {
            echo "GoogleApi not exists"."\r\n";
        }
    }
}
