<?php

namespace App\Repositories\Interfaces;

Interface RoomTypeInterface{
	public function allRoomTypes();
	public function storeRoomType($request);
	public function findRoomType($room_type);
	public function updateRoomType($request,$room_type);
	public function destroyRoomType($room_type);
}