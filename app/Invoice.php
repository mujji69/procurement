<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id','tender_id','invoice'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function tenders()
    {
        return $this->belongsTo('App\Tender','tender_id');
    }

}
