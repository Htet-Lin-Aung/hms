<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Repositories\Interfaces\{CustomerInterface,RoomInterface};

class CustomerController extends Controller
{
    private $customerRepository, $roomRepository;

    public function __construct(CustomerInterface $customerRepository, RoomInterface $roomRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->roomRepository = $roomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = $this->customerRepository->allCustomers($request);
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = $this->roomRepository->allRooms();
        $nrc_regions = get_nrc_regions();
        $nrc_townships = get_nrc_townships();
        $nrc_types = get_nrc_types();
        return view('customer.create',compact('rooms','nrc_regions','nrc_townships','nrc_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $this->customerRepository->storeCustomer($request);
        return redirect()->route('admin.customer.index')->with('success','Customer created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $rooms = $this->roomRepository->allRooms();
        $nrc_regions = get_nrc_regions();
        $nrc_townships = get_nrc_townships();
        $nrc_types = get_nrc_types();
        return view('customer.edit',compact('customer','rooms','nrc_regions','nrc_townships','nrc_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->customerRepository->updateCustomer($request->all(),$customer);
        return redirect()->route('admin.customer.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->customerRepository->destroyCustomer($customer);
        return redirect()->back()->with('danger','Successfully Deleted');
    }

    public function changeState(Request $request, Customer $customer)
    {
        // dd($request->status,$customer);
        $customer->update(['status'=>$request->status]);
        return redirect()->back()->with('success','Successfully changed');
    }
}
