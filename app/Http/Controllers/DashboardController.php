<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $today = Order::whereDate('created_at', $today)->get();

        $month = date('m');
        $month = Order::whereMonth('created_at', $month)->get();

        $year = date('Y');
        $year = Order::whereYear('created_at', $year)->get();

        $sales = Order::all();

        return view('admin.dashboard', compact('today', 'month', 'year', 'sales'));
    }
}
