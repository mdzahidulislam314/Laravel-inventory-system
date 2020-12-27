<?php

namespace App\Http\Controllers;

use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{

    public function PendingOrder()
    {
        $pending = DB::table('orders')
                    ->join('customers','orders.cus_id','customers.id')
                    ->select('customers.name','orders.*')
                    ->where('order_status','pending')
                    ->get();

        return view('orders.pending',compact('pending'));
    }

    public function viewOrder($id)
    {
        $order = DB::table('orders')
                    ->join('customers','orders.cus_id','customers.id')
                    ->where('orders.id',$id)
                    ->get();

        $order_details = DB::table('orderdetails')
                    ->join('products','orderdetails.product_id','products.id')
                    ->select('orderdetails.*','products.name','products.code')
                    ->where('orders.id',$id)
                    ->get();

        return $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('pos.index',compact('products','customers'));
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
