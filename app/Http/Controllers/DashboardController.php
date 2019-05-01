<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today_date = date('Y-m-d');
        $today = Order::whereDate('created_at', $today_date)->get();
        $yesterday = Order::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $month_date = date('m');
        $month = Order::whereMonth('created_at', $month_date)->get();
        $previous_month = Order::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_date = date('Y');
        $year = Order::whereYear('created_at', $year_date)->get();
        $previous_year = Order::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $sales = Order::all();

        $today_expenses = Expense::whereDate('created_at', $today_date)->get();
        $yesterday_expenses = Expense::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $month_expenses = Expense::whereMonth('created_at', $month_date)->get();
        $previous_month_expenses = Expense::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_expenses = Expense::whereYear('created_at', $year_date)->get();
        $previous_year_expenses = Expense::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $expenses = Expense::all();

        return view('admin.dashboard', compact('today','yesterday' ,'month','previous_month', 'year', 'previous_year', 'sales', 'today_expenses', 'yesterday_expenses', 'month_expenses', 'previous_month_expenses', 'year_expenses', 'previous_year_expenses', 'expenses'));
    }
}
