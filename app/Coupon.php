<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return static::where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } 
        
        if ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        }

        return 0;
    }
}
