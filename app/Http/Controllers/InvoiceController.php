<?php

namespace App\Http\Controllers;

use App\Customer;
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

        return view('admin.invoice', compact('customer', 'contents'));
    }
}
