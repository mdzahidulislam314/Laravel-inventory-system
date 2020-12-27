<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'phone' => 'required|unique:customers|max:16',
            'bank_branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required|unique:customers',
            'bank_name' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_branch = $request->bank_branch;
        $customer->account_name = $request->account_name;
        $customer->account_no = $request->account_no;
        $customer->city = $request->city;
        $customer->bank_name = $request->bank_name;
        $customer->address = $request->address;
        $customer->save();

        toast('Successfully Done!','success');
        return redirect()->route('customers.index');


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
        $customer = Customer::findOrFail($id);
        return view('customers.edit',compact('customer'));
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
            'bank_branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'bank_name' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_branch = $request->bank_branch;
        $customer->account_name = $request->account_name;
        $customer->account_no = $request->account_no;
        $customer->city = $request->city;
        $customer->bank_name = $request->bank_name;
        $customer->address = $request->address;
        $customer->save();

        toast('Successfully Done!','success');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
