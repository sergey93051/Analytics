<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class ApiChoose extends Model
{
    use HasFactory;

    protected $table = 'apichoose';
    protected $fillable = [
        'fbApi'
    ];
    public $timestamps = false;

    public function scopeCreateds($query, $getID)
    {

        if ($query->first()->exists()) {
            $query->update([
                'domen' => $getID
            ]);
        } else {
            $query->create([
                'domen' => $getID
            ]);
        }
    }
}
