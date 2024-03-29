<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class,'room_type_room_service');
    }
}
