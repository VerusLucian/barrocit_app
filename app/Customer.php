<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "tbl_customers";

    public function extraaddress()
    {
        return $this->hasOne('App\ExtraAddress');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function actions()
    {
        return $this->hasMany('App\Action');
    }

    public function invoices()
    {
        return $this->hasManyThrough('App\Invoice', 'App\Project');
    }

    public function status()
    {
        if($this->saldo() > $this->limit)
        {
            return 1;
        }
        else
            return 0;
    }
    public function saldo()
    {
        $count = 0;
        foreach ($this->invoices() as $invoice)
        {
            if($invoice->status == 2)
            {
                $count = +$invoice->price;
            }
            return $count;
        }
    }


}
