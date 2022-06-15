<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class FbapiChoose extends Model
{
    use HasFactory;

    protected $table = 'fbchoose';

    public $timestamps = false;

    protected $fillable = [
        'fbApi'
    ];

    public function scopeCreateds($query, $getApi)
    {
        if (!is_null($query->first())) {
            $query->update([
                'fbApi' => $getApi
            ]);
        } else {
            $query->create([
                'fbApi' => $getApi
            ]);
        }
    }
}
