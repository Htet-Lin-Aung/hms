<?php

namespace App\Repositories\Interfaces;

Interface RoomInterface{
	public function allRooms();
	public function storeRoom($request);
	public function findRoom($room);
	public function updateRoom($request,$room);
	public function destroyRoom($room);
}