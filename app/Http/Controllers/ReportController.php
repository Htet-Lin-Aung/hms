<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Filters\TransactionFilter;

class ReportController extends Controller
{
    public function report(TransactionFilter $filter)
    {
        $reports = Transaction::filter($filter)->cursor();

        return view('report',compact('reports'));
    }
}
