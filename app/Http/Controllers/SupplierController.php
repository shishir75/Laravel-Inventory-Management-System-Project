<?php

namespace App\Http\Controllers;

use App\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'name' => 'required | min:3',
            'email' => 'required| email | unique:suppliers',
            'phone' => 'required | unique:suppliers',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'required | image',
            'type' => 'required | integer',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('supplier'))
            {
                Storage::disk('public')->makeDirectory('supplier');
            }
            $postImage = Image::make($image)->resize(480, 320)->stream();
            Storage::disk('public')->put('supplier/'.$imageName, $postImage);
        } else
        {
            $imageName = 'default.png';
        }

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->photo = $imageName;
        $supplier->save();

        Toastr::success('Supplier Successfully Created', 'Success!!!');
        return redirect()->route('admin.supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'email' => 'required| email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'image',
            'type' => 'required | integer',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('supplier'))
            {
                Storage::disk('public')->makeDirectory('supplier');
            }

            // delete old photo
            if (Storage::disk('public')->exists('supplier/'. $supplier->photo))
            {
                Storage::disk('public')->delete('supplier/'. $supplier->photo);
            }

            $postImage = Image::make($image)->resize(480, 320)->stream();
            Storage::disk('public')->put('supplier/'.$imageName, $postImage);
        } else
        {
            $imageName = $supplier->photo;
        }

        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->photo = $imageName;
        $supplier->save();

        Toastr::success('Supplier Successfully Updated', 'Success!!!');
        return redirect()->route('admin.supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // delete old photo
        if (Storage::disk('public')->exists('supplier/'. $supplier->photo))
        {
            Storage::disk('public')->delete('supplier/'. $supplier->photo);
        }

        $supplier->delete();
        Toastr::success('Supplier Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.supplier.index');
    }
}
