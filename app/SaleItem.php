<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
