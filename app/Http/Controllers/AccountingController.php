<?php

namespace App\Http\Controllers;

use App\Models\CustomerTreatment;
use App\Models\Sell;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        $customerTreatment = new CustomerTreatment;
        $sell = new Sell;

        return view('accounting.index', [
            'get_day_sum' => $customerTreatment->get_day_sum(),
            'get_month_sum' => $customerTreatment->get_month_sum(),
            'get_year_sum' => $customerTreatment->get_year_sum(),
            'get_day_sell_sum' => $sell->get_day_sell_sum(),
            'get_month_sell_sum' => $sell->get_month_sell_sum(),
            'get_year_sell_sum' => $sell->get_year_sell_sum(),
        ]
        );
    }

    public function get_by_date(Request $request)
    {
        $customerTreatment = new CustomerTreatment;
        $sell = new Sell;

        return view('accounting.index', [
            'get_day_sum' => $customerTreatment->get_day_sum(),
            'get_month_sum' => $customerTreatment->get_month_sum(),
            'get_year_sum' => $customerTreatment->get_year_sum(),
            'get_day_sell_sum' => $sell->get_day_sell_sum(),
            'get_month_sell_sum' => $sell->get_month_sell_sum(),
            'get_year_sell_sum' => $sell->get_year_sell_sum(),
            'get_date_sum' => $customerTreatment->get_date_sum($request->from_date, $request->to_date),
            'get_date_sell_sum' => $sell->get_date_sell_sum($request->from_date, $request->to_date),
        ]
        );
    }
}
