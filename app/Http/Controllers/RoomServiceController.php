<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomService;
use App\Http\Requests\RoomServiceRequest;
use App\Repositories\Interfaces\RoomServiceInterface;

class RoomServiceController extends Controller
{
    private $roomServiceRepository;

    public function __construct(RoomServiceInterface $roomServiceRepository)
    {
        $this->roomServiceRepository = $roomServiceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_services = $this->roomServiceRepository->allRoomServices();
        return view('room_service.index',compact('room_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room_service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomServiceRequest $request)
    {
        $this->roomServiceRepository->storeRoomService($request);
        return redirect()->route('admin.room-service.index')->with('success','Room service was created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomService $room_service)
    {
        return view('room_service.show',compact('room_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomService $room_service)
    {
        return view('room_service.edit',compact('room_service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomServiceRequest $request, RoomService $room_service)
    {
        $this->roomServiceRepository->updateRoomService($request->all(),$room_service);
        return redirect()->route('admin.room-service.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomService $room_service)
    {
        $this->roomServiceRepository->destroyRoomService($room_service);
        return redirect()->back()->with('danger','Successfully Deleted');
    }
}
