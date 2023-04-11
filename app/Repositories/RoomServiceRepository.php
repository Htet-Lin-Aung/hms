<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoomServiceInterface;
use App\Models\RoomService;

class RoomServiceRepository implements RoomServiceInterface
{
	public function allRoomServices()
	{
        $room_services = RoomService::latest()->cursor();
		return $room_services;
	}

	public function storeRoomService($request)
	{
		$room_service = RoomService::create($request->all());
		return $room_service;
	}

	public function findRoomService($room_service)
	{
		return $room_service;
	}

	public function updateRoomService($request,$room_service)
	{
		return $room_service->update($request);
	}

	public function destroyRoomService($room_service)
	{
		return $room_service->delete();
	}
}