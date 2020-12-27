<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Advsalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvsalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advsalary = DB::table('advsalaries')
                        ->join('employees','advsalaries.emp_id','employees.id')
                        ->select('advsalaries.*','employees.name','employees.salary')
                        ->get();

        return view('advsalaries.index',compact('advsalary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('advsalaries.create',compact('employees'));
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
            'month' => 'required',
            'year' => 'required',
            'amount' => 'required',
        ]);

        $month = $request->month;
        $emp_id = $request->emp_id;
        $advance = DB::table('advsalaries')
                    ->where('month',$month)
                    ->where('emp_id',$emp_id)
                    ->first();
        if ($advance === NULL) {

            $advsalary = new Advsalary();
            $advsalary->emp_id =$request->emp_id;
            $advsalary->month =$request->month;
            $advsalary->year =$request->year;
            $advsalary->amount =$request->amount;
            $advsalary->save();
            
            toast('Successfully Done!','success');
            return redirect()->route('adv-salaries.index');
        }else{

            toast('Already Advance Paid In this month!','warning');
            return redirect()->route('adv-salaries.index');
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
    
        $data = [
            'advances' => Advsalary::all(),
            'employees' => Employee::all()
        ];

        return view('advsalaries.edit',$data);
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
        $advsalary = Advsalary::findOrFail($id);
        $advsalary->delete();
        return redirect()->back();
    }
}
