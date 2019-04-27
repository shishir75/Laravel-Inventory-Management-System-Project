<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'customer_id' => 'required | integer',
        ];
        $customMessages = [
            'customer_id.required' => 'Select a Customer first!.',
            'customer_id.integer' => 'Invalid Customer!.'
        ];
        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer_id = $request->input('customer_id');
        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
        $company = Setting::latest()->first();
        return view('admin.invoice', compact('customer', 'contents', 'company'));
    }

    public function print($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
        $company = Setting::latest()->first();
        return view('admin.print', compact('customer', 'contents', 'company'));
    }

    public function final_invoice(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'payment_status' => 'required',
          'customer_id' => 'required | integer',
        ];
        $customMessages = [
            'payment_status.required' => 'Select a Payment method first!.',
        ];

        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->payment_status = $request->input('payment_status');
        $order->pay = $request->input('pay');
        $order->due = $request->input('due');
        $order->order_date = date('Y-m-d');
        $order->order_status = 'pending';
        $order->total_products = Cart::count();
        $order->sub_total = Cart::subtotal();
        $order->vat = Cart::tax();
        $order->total = Cart::total();
        $order->save();

        $order_id = $order->id;
        $contents = Cart::content();

        foreach ($contents as $content)
        {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $content->id;
            $order_detail->quantity = $content->qty;
            $order_detail->unit_cost = $content->price;
            $order_detail->total = $content->total;
            $order_detail->save();
        }

        Cart::destroy();

        Toastr::success('Invoice created successfully', 'Success');
        return redirect()->route('admin.dashboard');


    }



}
