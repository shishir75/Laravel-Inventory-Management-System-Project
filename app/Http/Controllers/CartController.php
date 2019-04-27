<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'id' => 'required | integer',
          'name' => 'required',
          'qty' => 'required',
          'price' => 'required',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');

        $add = Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 1 ]);
        if ($add)
        {
            Toastr::success('Product successfully added to cart', 'Success');
            return redirect()->back();

        } else {

            Toastr::error('Product not added to cart', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $qty = $request->input('qty');
        Cart::update($rowId, $qty);

        Toastr::success('Cart Updated Successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Toastr::success('Product Successfully', 'Success');
        return redirect()->back();
    }
}
