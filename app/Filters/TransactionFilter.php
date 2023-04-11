<?php

namespace App\Filters;
use Carbon\Carbon;

class TransactionFilter extends Filters
{

	/**
	 * Register filter properties
	 */
	protected $filters = [
		'payment_type','start_date','end_date'
	];

	/**
	 * Filter by date.
	 */
	public function start_date($value) 
	{
		return $this->builder->whereDate('created_at', '>=', $value);
	}

	/**
	 * Filter by date.
	 */
	public function end_date($value) 
	{
		return $this->builder->whereDate('created_at', '<=', $value);	
	}

	/**
	 * Filter by payment type.
	 */
	public function payment_type($value) 
	{
		return $this->builder->wherePaymentType($value);
	}
}