<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'user_id', 'tender_id', 'org_name','address','phone','start_date','end_date','Price','country','Quantity','proposal','terms', 'flag'
    ];


    public function items()
    {
        return $this->hasMany('App\Item');
    }


    public function timelines()
    {
        return $this->hasMany('App\Timeline');
    }

    public function uploads()
    {
        return $this->belongsTo('App\Upload','upload_id');
    }
}
