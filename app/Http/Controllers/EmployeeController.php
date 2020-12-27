<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function _constructor()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'name' => 'required|max:30',
            'email' => 'required|email',
            'phone' => 'required|unique:employees|max:16',
            'nid_no' => 'required|unique:employees|max:16',
            'salary' => 'required',
            'city' => 'required',
            'vacation' => 'required',
            'address' => 'required',
        ]);

        $image = $request->file('photo');

        if (isset($image)) {

            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'uploads/employee-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }
        
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->nid_no = $request->nid_no;
        $employee->salary = $request->salary;
        $employee->experience = $request->experience;
        $employee->city = $request->city;
        $employee->photo = $imageUrl;
        $employee->vacation = $request->vacation;
        $employee->address = $request->address;
        $employee->save();

        toast('Successfully Done!','success');

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employees.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit',compact('employee'));
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
            'name' => 'required|max:30',
            'email' => 'required|email',
            'phone' => 'required|max:16',
            'nid_no' => 'required|max:16',
            'salary' => 'required',
            'city' => 'required',
            'vacation' => 'required',
            'address' => 'required',
        ]);
        
        $image = $request->file('photo');
        $employee = Employee::findOrFail($id);

        if (isset($image)) {

            unlink($employee->photo);
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'uploads/employee-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }else{
            $imageUrl = $employee->photo;
        }
        
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->nid_no = $request->nid_no;
        $employee->salary = $request->salary;
        $employee->experience = $request->experience;
        $employee->city = $request->city;
        $employee->photo = $imageUrl;
        $employee->vacation = $request->vacation;
        $employee->address = $request->address;
        $employee->save();

        toast('Successfully Done!','success');

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        unlink($data->photo);
        $data->delete();
        return redirect()->back();
    }
}
