<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
       $data = array();
       $data['id'] = $request->id;
       $data['name'] = $request->name;
       $data['qty'] = $request->qty;
       $data['price'] = $request->price;

       $add = Cart::add($data);

       if ( $add) {
        
        return redirect()->back();

       }else {
        toast('Cart Not added :(','error');
        return redirect()->back();
       }
    }

    public function catUpdate(Request $request, $rowId )
    {
        $qty = $request->qty;
        $catUp = Cart::update($rowId, $qty);

        if ( $catUp) {

        toast('Cart Updated Done!','success');
        return redirect()->back();

       }else {
        toast('Cart Not Updated :(','error');
        return redirect()->back();
       }
    }

    public function catDelete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();

    }

    public function invoice(Request $request)
    { 
        $request->validate([
            'cus_id' => 'required',

        ]);

        $cus_id = $request->cus_id;
        $customer = Customer::where('id',$cus_id)->first();
        $contents = Cart::content();
        return View('pos.invoice',compact('customer','contents'));
      
    }

    
    public function finalInvoice(Request $request)
    { 
        $request->validate([
            'payment_status' => 'required',
        ]);

        $data = array();
        $data['cus_id'] = $request->cus_id;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['order_date'] = $request->order_date;
        $data['vat'] = $request->vat;
        $data['grand_total'] = $request->grand_total;

        $order_id = DB::table('orders')->insertGetId($data);

        $contents = Cart::content();

        $odata = array();
        foreach( $contents as $content){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['qty'] = $content->qty;
            $odata['unit_price'] = $content->price;
            $odata['total_price'] = $content->total;

            $insert = DB::table('orderdetails')->insert($odata);
        }

        if ($insert) {
            toast('Successfully Done!','success');
            Cart::destroy();
            return redirect()->route('pos.index');
        }else{
            toast('Something is worng!','error');
            return redirect()->route('pos.index');
        }
      
    }


}
