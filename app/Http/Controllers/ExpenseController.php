<?php

namespace App\Http\Controllers;

use App\Expense;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::latest()->get();
        return view('admin.expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expense.create');
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
          'amount' => 'required'
        ];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $date = Carbon::now();

        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->month = $date->format('F');
        $expense->year = $date->format('Y');
        $expense->date = $date->format('Y-m-d');
        $expense->save();

        Toastr::success('Expense added successfully', 'Success');
        return redirect()->route('admin.expense.today');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('admin.expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'amount' => 'required'
        ];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->save();

        Toastr::success('Expense updated successfully', 'Success');
        return redirect()->route('admin.expense.today');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        Toastr::success('Expense deleted successfully', 'Success');
        return redirect()->back();
    }


    public function today_expense()
    {
        $today = date('Y-m-d');
        $expenses = Expense::latest()->where('date', $today)->get();
        return view('admin.expense.today', compact('expenses'));
    }

    public function month_expense($month = null)
    {
        if ($month == null)
        {
            $month = date('F');
        }
        $expenses = Expense::latest()->where('month', $month)->get();
        return view('admin.expense.month', compact('expenses', 'month'));
    }

    public function yearly_expense($year = null)
    {
        if ($year == null)
        {
            $year = date('Y');
        }
        $expenses = Expense::latest()->where('year', $year)->get();
        $years = Expense::select('year')->distinct()->take(12)->get();
        return view('admin.expense.year', compact('expenses', 'year', 'years'));
    }


}
