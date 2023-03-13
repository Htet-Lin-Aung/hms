<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoomInterface;
use App\Models\Room;

class RoomRepository implements RoomInterface
{
	public function allRooms()
	{
		$rooms = Room::paginate(30);
		return $rooms;
	}

	public function storeRoom($request)
	{
		$room = Room::create($request->all());
		if ($request->hasFile('other_images')) {
			$fileAdders = $room->addMultipleMediaFromRequest(['other_images'])
				->each(function ($fileAdder) {
					$fileAdder->toMediaCollection('images');
				});
		}
		return $room;
	}

	public function findRoom($room)
	{
		return $room;
	}

	public function updateRoom($data,$room)
	{
		return $room->update($data);
	}

	public function destroyRoom($room)
	{
		return $room->delete();
	}
}