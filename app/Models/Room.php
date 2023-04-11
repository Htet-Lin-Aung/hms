<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Room extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['room_no','price','people','room_type_id'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
