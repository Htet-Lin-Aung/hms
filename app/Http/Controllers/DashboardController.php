<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer,Room};
use App\Repositories\Interfaces\{RoomInterface};
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    private $roomRepository;

    public function __construct(RoomInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getCount()
    {
        //booking,checkin,checkout count
        $customers = Customer::where('check_in','<=',today())->where('check_out','>=',today())->get([
            'customers.id as id',
            \DB::raw('(CASE
                WHEN customers.status = "booking" THEN "booking_count" 

                WHEN customers.status = "checkin" THEN "checkin_count"

                WHEN customers.status = "checkout" THEN "checkout_count"

                END)AS count'
            )
        ])->groupBy(['count']);

        //room count
        $room_count =Room::select('id','room_no')
        ->whereDoesntHave('customers', function($q) {
                    $q->where('check_in', '<=', today())
                        ->where('check_out', '>', today())
                        ->where('status', '<>', 'checkout');
                    })
                    ->count();

        //monthly transaction amount
        $monthlyAmounts = DB::table(DB::raw('(SELECT 1 as `month` UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12) as `months`'))
            ->leftJoin(DB::raw('(SELECT YEAR(created_at) year, MONTH(created_at) month, SUM(amount) amount FROM transactions GROUP BY year, month) as `t`'), function ($join) {
                $join->on('months.month', '=', 't.month')->whereRaw('t.year = YEAR(CURRENT_DATE())');
            })
            ->select('months.month', DB::raw('COALESCE(t.amount, 0) as amount'))
            ->orderBy('months.month')
            ->pluck('amount')
            ->toArray();

        return view('dashboard',compact('customers','room_count','monthlyAmounts'));
    }
}
