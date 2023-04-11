<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoomInterface;
use App\Models\Room;

class RoomRepository implements RoomInterface
{
	public function allRooms()
	{
		$rooms = Room::latest()->cursor();
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

	public function getRestRoomsByPeople($checkin,$checkout,$people)
	{
		$unique_people = Room::whereDoesntHave('customers', function($q) use ($checkin, $checkout) {
			        $q->where('check_in', '<=', $checkin)
			            ->where('check_out', '>', $checkin)
			            ->where('status', '<>', 'checkout');
				    })
				    ->distinct('people')
				    ->pluck('people');
		$html = '';

		foreach ($unique_people as $person) {
		    $selected = $person == $people ? 'selected' : '';
		    $html .= "<option value='{$person}' {$selected}>{$person}</option>";
		}

		return $html;
	}

	public function getRestRooms($people,$checkin,$checkout,$room_id,$room_no)
	{
		$available_rooms =Room::select('id','room_no')
		->whereDoesntHave('customers', function($q) use ($checkin, $checkout) {
			        $q->where('check_in', '<=', $checkin)
			            ->where('check_out', '>', $checkin)
			            ->where('status', '<>', 'checkout');
				    })
					->wherePeople($people)
				    ->get();

	    $html = '';

		foreach ($available_rooms as $room) {
		    $html .= $room_id ?  "<option value='{$room_id}'>{$room_no}</option>" : '';
		    $html .= "<option value='{$room->id}'>{$room->room_no}</option>";
		}
		return $html;
	}
}