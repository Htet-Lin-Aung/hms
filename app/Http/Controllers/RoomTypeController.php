<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Http\Requests\RoomTypeRequest;
use App\Repositories\Interfaces\{RoomTypeInterface,RoomServiceInterface};

class RoomTypeController extends Controller
{
    private $roomTypeRepository,$roomServiceRepository;

    public function __construct(RoomTypeInterface $roomTypeRepository, RoomServiceInterface $roomServiceRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
        $this->roomServiceRepository = $roomServiceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = $this->roomTypeRepository->allRoomTypes();
        return view('room_type.index',compact('room_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_services = $this->roomServiceRepository->allRoomServices();
        return view('room_type.create',compact('room_services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $this->roomTypeRepository->storeRoomType($request);
        return redirect()->route('admin.room-type.index')->with('success','Room type created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $room_type)
    {

        return view('room_type.show',compact('room_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $room_type)
    {
        $room_services = $this->roomServiceRepository->allRoomServices();
        return view('room_type.edit',compact('room_type','room_services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, RoomType $room_type)
    {
        $this->roomTypeRepository->updateRoomType($request->all(),$room_type);
        return redirect()->route('admin.room-type.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $room_type)
    {
        $this->roomTypeRepository->destroyRoomType($room_type);
        return redirect()->back()->with('danger','Successfully Deleted');
    }
}
