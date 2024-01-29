<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details(){
        return $this->hasOne(SellTransactionDetail::class);
    }
}
