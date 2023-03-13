<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoomTypeInterface;
use App\Models\RoomType;

class RoomTypeRepository implements RoomTypeInterface
{
	public function allRoomTypes()
	{
        $room_types = RoomType::latest()->paginate(30);
		return $room_types;
	}

	public function storeRoomType($request)
	{
		$room_type = RoomType::create($request->all());
		$room_type->roomServices()->attach($request->room_services);
		if ($request->hasFile('images')) {
			$fileAdders = $room_type->addMultipleMediaFromRequest(['images'])
				->each(function ($fileAdder) {
					$fileAdder->toMediaCollection('images');
				});
		}
		return $room_type;
	}

	public function findRoomType($room_type)
	{
		return $room_type;
	}

	public function updateRoomType($request,$room_type)
	{
		return $room_type->update($request);
	}

	public function destroyRoomType($room_type)
	{
		return $room_type->delete();
	}
}