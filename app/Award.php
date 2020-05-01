<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = [
        'upload_id','awarded date',
    ];

    public function uploads()
    {
        return $this->belongsTo('App\Upload','upload_id');
    }
}
