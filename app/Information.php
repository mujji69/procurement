<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'upload_id','org_name','address','phone','start_date','end_date','Price','Quantity','proposal','terms'
    ];


    public function items()
    {
        return $this->hasMany('App\Item');
    }


    public function timelines()
    {
        return $this->hasMany('App\Timeline');
    }
}
