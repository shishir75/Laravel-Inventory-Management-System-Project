<?php

namespace App\Http\Controllers;

use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
            'email' => 'required| email | unique:employees',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'photo' => 'required | image',
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
            if (!Storage::disk('public')->exists('employee'))
            {
                Storage::disk('public')->makeDirectory('employee');
            }
            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('employee/'.$imageName, $postImage);
        } else
        {
            $imageName = 'default.png';
        }

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->experience = $request->input('experience');
        $employee->nid_no = $request->input('nid_no');
        $employee->salary = $request->input('salary');
        $employee->vacation = $request->input('vacation');
        $employee->experience = $request->input('experience');
        $employee->photo = $imageName;
        $employee->save();

        Toastr::success('Employee Successfully Created', 'Success!!!');
        return redirect()->route('admin.employee.index');

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
