<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;
use App\Repositories\Interfaces\{RoomInterface, RoomTypeInterface};

class RoomController extends Controller
{
    private $roomRepository,$roomTypeRepository;

    public function __construct(RoomInterface $roomRepository, RoomTypeInterface $roomTypeRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->roomTypeRepository = $roomTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = $this->roomRepository->allRooms();
        return view('room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_types = $this->roomTypeRepository->allRoomTypes();
        return view('room.create',compact('room_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $this->roomRepository->storeRoom($request);
        return redirect()->route('admin.room.index')->with('success','Room created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('room.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $room_types = $this->roomTypeRepository->allRoomTypes();
        return view('room.edit',compact('room','room_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        $this->roomRepository->updateRoom($request->all(),$room);
        return redirect()->route('admin.room.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $this->roomRepository->destroyRoom($room);
        return redirect()->back()->with('danger','Successfully Deleted');
    }
}
