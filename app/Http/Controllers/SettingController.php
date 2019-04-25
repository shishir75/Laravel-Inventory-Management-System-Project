<?php

namespace App\Http\Controllers;

use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::latest()->first();
        return view('admin.setting', compact('setting'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->except('_token');
        $rules = [
          'name' => 'required',
          'email' => 'required',
          'mobile' => 'required',
          'address' => 'required',
          'city' => 'required',
          'country' => 'required',
          'zip_code' => 'required',
          'logo' => 'image | nullable',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $image = $request->file('logo');
        $slug =  Str::slug($request->input('name'));

        $setting = Setting::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('setting'))
            {
                Storage::disk('public')->makeDirectory('setting');
            }

            // delete old post photo
            if (Storage::disk('public')->exists('setting/'.$setting->logo))
            {
                Storage::disk('public')->delete('setting/'.$setting->logo);
            }

            $postImage = Image::make($image)->resize(200, 180)->stream();
            Storage::disk('public')->put('setting/'.$imageName, $postImage);

        } else
        {
            $imageName = $setting->logo;
        }


        $setting->name = $request->input('name');
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');
        $setting->address = $request->input('address');
        $setting->city = $request->input('city');
        $setting->mobile = $request->input('mobile');
        $setting->zip_code = $request->input('zip_code');
        $setting->country = $request->input('country');
        $setting->logo = $imageName;
        $setting->save();

        Toastr::success('Setting Successfully Updated', 'Success!!!');
        return redirect()->route('admin.setting.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
