<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    function books()
    {
        return view('dashboard.reports.sales.books');
    }
    function revenue()
    {
        return view('dashboard.reports.sales.revenue');
    }
    function trends()
    {
        return view('dashboard.reports.sales.trends');
    }
}