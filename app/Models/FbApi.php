<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class FbApi extends Model
{
    use HasFactory;

    protected $table = 'fbApi';

    public $timestamps = false;

    public function scopechange($query, $fbId)
    {

        try {
            if ($query->first()->exists()) {
                return  $query->where('FCACCAUNT',$fbId)->pluck('FCACCAUNT')[0];
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            print "Fb not exists";
        }
    }
}
