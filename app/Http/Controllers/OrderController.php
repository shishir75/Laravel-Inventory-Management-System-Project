<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Order;
use App\OrderDetail;
use App\Setting;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function show($id)
    {
        $order = Order::with('customer')->where('id', $id)->first();
        //return $order;
        $order_details = OrderDetail::with('product')->where('order_id', $id)->get();
        //return $order_details;
        $company = Setting::latest()->first();
        return view('admin.order.order_confirmation', compact('order_details', 'order', 'company'));
    }


    public function pending_order()
    {
        $pendings = Order::latest()->with('customer')->where('order_status', 'pending')->get();
        return view('admin.order.pending_orders', compact('pendings'));
    }

    public function approved_order()
    {
        $approveds = Order::latest()->with('customer')->where('order_status', 'approved')->get();
        return view('admin.order.approved_orders', compact('approveds'));
    }

    public function order_confirm($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'approved';
        $order->save();

        Toastr::success('Order has been Approved! Please delivery the products', 'Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        Toastr::success('Order has been deleted', 'Success');
        return redirect()->back();
    }

    public function download($order_id)
    {
        $order = Order::with('customer')->where('id', $order_id)->first();
        //return $order;
        $order_details = OrderDetail::with('product')->where('order_id', $order_id)->get();
        //return $order_details;
        $company = Setting::latest()->first();

        set_time_limit(300);

        $pdf = PDF::loadView('admin.order.pdf', ['order'=>$order, 'order_details'=> $order_details, 'company'=> $company]);

        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/pdf/'.$order->customer->name .'-'. str_pad($order->id,9,"0",STR_PAD_LEFT). '.pdf' ,$content) ;

        Toastr::success('PDF successfully saved', 'Success');
        return redirect()->back();

    }

    // for sales report
    public function today_sales()
    {
        $today = date('Y-m-d');

        $balance = Order::where('order_date', $today)->get();

        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('customers.name as customer_name', 'products.name AS product_name', 'order_details.*')
            ->where('orders.order_date' , '=', $today)
            ->orderBy('order_details.created_at', 'desc')
            ->get();

        return view('admin.sales.today', compact('orders', 'balance'));
    }

    public function monthly_sales($month = null)
    {

        if ($month == null)
        {
            $month = date('m');
        } else {
            $month = date('m', strtotime($month));
        }

        $balance = Order::whereMonth('order_date', $month)->get();

        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('customers.name as customer_name', 'products.name AS product_name', 'order_details.*')
            ->whereMonth('orders.created_at' , '=', $month)
            ->orderBy('order_details.created_at', 'desc')
            ->get();

        return view('admin.sales.month', compact('orders', 'month', 'balance'));
    }

    public function total_sales()
    {
        $balance = Order::all();

        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('customers.name as customer_name', 'products.name AS product_name', 'order_details.*')
            ->orderBy('order_details.created_at', 'desc')
            ->get();

        return view('admin.sales.index', compact('balance', 'orders'));
    }


}
