<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['room_id','name','nrc_region','nrc_township','nrc_type','nrc_no','other_nrc','email','phone','address','check_in','check_out','payment_status','status','revenue_source'];

    public function getNrcAttribute()
    {
        return $this->nrc_region.'/'.get_township_name($this->nrc_township).'('.$this->nrc_type.')'.$this->nrc_no;
    }

    public function getStateAttribute()
    {
        return $this->status == 'checkin' ? 'checkout' : 'checkin';
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getPrepaidAttribute()
    {
        return $this->transactions()->wherePaymentType('prepaid')->sum('amount');
    }

    public function getBalanceAttribute()
    {
        return $this->transactions()->wherePaymentType('balance')->sum('amount');
    }
}
