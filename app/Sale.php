<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
