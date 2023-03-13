<?php

namespace App\Repositories\Interfaces;

Interface CustomerInterface{
	public function allCustomers($request);
	public function storeCustomer($request);
	public function findCustomer($customer);
	public function updateCustomer($request,$customer);
	public function destroyCustomer($customer);
}