<?php

namespace App\Repositories\Interfaces;

Interface RoomServiceInterface{
	public function allRoomServices();
	public function storeRoomService($request);
	public function findRoomService($room_service);
	public function updateRoomService($request,$room_service);
	public function destroyRoomService($room_service);
}