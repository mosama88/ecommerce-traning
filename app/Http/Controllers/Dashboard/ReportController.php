<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    function books()
    {

        $dailySales = Order::whereDate('created_at', Carbon::today())->sum('total');
        $dailyOrders = Order::whereDate('created_at', Carbon::today())->count();

        $weeklySales = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $weeklyOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $monthSales = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)->count();
        // dd($dailySales);
        return view('dashboard.reports.sales.books', compact('dailySales', 'dailyOrders', 'weeklySales', 'weeklyOrders', 'monthSales', 'monthOrders'));
    }
    function revenue()
    {

        $dailyRevenue = DB::table('orders')->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')->orderBy('date')->get();


        $weeklyRevenue = DB::table('orders')
            ->selectRaw('YEARWEEK(created_at) as week, SUM(total) as revenue')
            ->where('created_at', '>=', now()->subWeeks(6))
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        $monthlyRevenue = DB::table('orders')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total) as revenue')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();




        // dd($dailyRevenue);
        return view('dashboard.reports.sales.revenue', compact('dailyRevenue', 'weeklyRevenue', 'monthlyRevenue'));
    }
    function trends()
    {
        return view('dashboard.reports.sales.trends');
    }
}