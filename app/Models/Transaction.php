<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','payment_type','amount','created_at'];

    public function scopeFilter($query,$filter)
    {
        $filter->apply($query);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
