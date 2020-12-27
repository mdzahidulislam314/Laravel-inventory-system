<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index',compact('expenses'));
    } 
    
    public function todayExp()
    {
       $date = date("m/d/yy");
       $todayExp = Expense::where('date', $date)->get();
       $expSum = Expense::where('date', $date)->sum('amount');
       return view('expenses.todayexp',compact('todayExp','expSum'));    
    }  
    
    public function monthlyExp()
    {
       $month = date("F");
       $monthlyExp = Expense::where('month', $month)->get();
       $expSum = Expense::where('month', $month)->sum('amount');
       return view('expenses.monthlyexp',compact('monthlyExp','expSum'));    
    } 
    
    public function janExp()
    {
       $month = "January";
       $monthlyExp = Expense::where('month', $month)->get();
       $expSum = Expense::where('month', $month)->sum('amount');
       return view('expenses.monthlyexp',compact('monthlyExp','expSum'));    
    } 

    public function febExp()
    {
       $month = "February";
       $monthlyExp = Expense::where('month', $month)->get();
       $expSum = Expense::where('month', $month)->sum('amount');
       return view('expenses.monthlyexp',compact('monthlyExp','expSum')); 
    } 
    
    public function augExp()
    {
       $month = "August";
       $monthlyExp = Expense::where('month', $month)->get();
       $expSum = Expense::where('month', $month)->sum('amount');
       return view('expenses.monthlyexp',compact('monthlyExp','expSum')); 
    } 

    public function yearlyExp()
    {
       $year = date("Y");
       $yearlyExp = Expense::where('year', $year)->get();
       $expSum = Expense::where('year', $year)->sum('amount');
       return view('expenses.yearlyexp',compact('yearlyExp','expSum'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'note' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $expense = new Expense();
        $expense->amount = $request->amount;
        $expense->note = $request->note;
        $expense->date = $request->date;
        $expense->month = $request->month;
        $expense->year = $request->year;
        $expense->save();
        toast('Successfully Done!','success');
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit',compact('expense'));
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
        $request->validate([
            'amount' => 'required',
            'note' => 'required',
            'date' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        

        $expense = Expense::findOrFail($id);
        $expense->amount = $request->amount;
        $expense->note = $request->note;
        $expense->date = $request->date;
        $expense->month = $request->month;
        $expense->year = $request->year;
        $expense->save();
        toast('Successfully Done!','success');
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->back();
    }
}
