<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerInterface
{
	public function allCustomers($request)
	{
		$customers = Customer::whereStatus($request->status)->latest()->cursor();
		return $customers;
	}

	public function storeCustomer($request)
	{
		$customer = Customer::create($request->all());
		if ($request->hasFile('images')) {
			$fileAdders = $customer->addMultipleMediaFromRequest(['images'])
				->each(function ($fileAdder) {
					$fileAdder->toMediaCollection('images');
				});
		}
		return $customer;
	}

	public function findCustomer($customer)
	{
		return $customer;
	}

	public function updateCustomer($data,$customer)
	{
		$data['status'] = $data['status'] ?? 'checkin';
		return $customer->update($data);
	}

	public function destroyCustomer($customer)
	{
		return $customer->delete();
	}
}