<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = ['name','publishing_date','closing_date','category','document','status','responses','description','vendors'];
    // protected $dates = ['publishing_date','closing_date'];

    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function pos()
    {
        return $this->hasMany('App\Po');
    }
}
