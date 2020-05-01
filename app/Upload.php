<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
   protected $fillable = [
        'user_id', 'tender_id', 'quotation', 'isSelected', 'quotationText'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function tenders()
    {
        return $this->belongsTo('App\Tender','tender_id');
    }

    public function awards()
    {
        return $this->hasOne('App\Award');
    }

    public function information()
    {
        return $this->hasOne('App\Information');
    }
}
