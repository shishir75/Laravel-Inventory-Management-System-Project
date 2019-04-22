<?php

namespace App\Http\Controllers;

use App\Advanced_Salary;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdvancedSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advanced_salaries = Advanced_Salary::latest()->with('employee')->get();
        return view('admin.advanced_salary.index', compact('advanced_salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.advanced_salary.create', compact('employees'));
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
            'employee_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'advanced_salary' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $advanced_salary = Advanced_Salary::where('employee_id', $request->employee_id)->where('month', $request->month)->where('year', $request->year)->first();

        if (!$advanced_salary)
        {
            $advanced_salary = new Advanced_Salary();
            $advanced_salary->employee_id = $request->input('employee_id');
            $advanced_salary->month = $request->input('month');
            $advanced_salary->year = $request->input('year');
            $advanced_salary->advanced_salary = $request->input('advanced_salary');
            $advanced_salary->save();

            Toastr::success('Advanced Salary Successfully Paid', 'Success!!!');
            return redirect()->route('admin.advanced_salary.index');

        } else {
            Toastr::error('Advanced salary already paid for the employee', 'Error!!!');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return view('admin.advanced_salary.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        return view('admin.advanced_salary.edit', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advanced_Salary  $advanced_Salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advanced_Salary $advanced_Salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advanced_Salary  $advanced_Salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advanced_Salary $advanced_Salary)
    {
        //
    }
}
