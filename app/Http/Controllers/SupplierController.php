<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('suppliers.create');
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
            'shop_name' => 'required',
            'phone' => 'required|unique:suppliers|max:16',
            'bank_branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required|unique:suppliers',
            'bank_name' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->account_name = $request->account_name;
        $supplier->account_no = $request->account_no;
        $supplier->city = $request->city;
        $supplier->bank_name = $request->bank_name;
        $supplier->address = $request->address;
        $supplier->shop_name = $request->shop_name;
        $supplier->save();

        toast('Successfully Done!','success');
        return redirect()->route('suppliers.index');

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
       $supplier = Supplier::findOrFail($id);
       return view('suppliers.edit',compact('supplier'));
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
            'shop_name' => 'required',
            'phone' => 'required',
            'bank_branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'bank_name' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->account_name = $request->account_name;
        $supplier->account_no = $request->account_no;
        $supplier->city = $request->city;
        $supplier->bank_name = $request->bank_name;
        $supplier->address = $request->address;
        $supplier->shop_name = $request->shop_name;
        $supplier->save();

        toast('Successfully Done!','success');
        return redirect()->route('suppliers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back();
    }
}
