<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Supplier;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create',compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        if (isset($image)) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'uploads/product-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }
       $product = new Product();
       $product->name = $request->name;
       $product->cat_id = $request->cat_id;
       $product->sup_id = $request->sup_id;
       $product->code = $request->code;
       $product->store_room = $request->store_room;
       $product->store_route = $request->store_route;
       $product->buy_date = $request->buy_date;
       $product->expire_date = $request->expire_date;
       $product->buying_price = $request->buying_price;
       $product->selling_price = $request->selling_price;
       if (isset($imageUrl)) {
        $product->image = $imageUrl;
       }
       $product->save();
       
       toast('Successfully Done!','success');
       return redirect()->route('products.index');

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

            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::findOrFail($id)
        ];

        return view('products.edit',$data);
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
        $image = $request->file('image');
        $product = Product::findOrFail($id);

        if (isset($image)) {
            unlink($product->image);
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $directory = 'uploads/product-image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
        }else{
            $imageUrl = $product->image;
        }
       
       $product->name = $request->name;
       $product->cat_id = $request->cat_id;
       $product->sup_id = $request->sup_id;
       $product->code = $request->code;
       $product->store_room = $request->store_room;
       $product->store_route = $request->store_route;
       $product->buy_date = $request->buy_date;
       $product->expire_date = $request->expire_date;
       $product->buying_price = $request->buying_price;
       $product->selling_price = $request->selling_price;
       $product->image = $imageUrl;
       $product->save();
       
       toast('Successfully Done!','success');
       return redirect()->route('products.index');
    }

    // Excel import & export method
    public function importProduct()
    {
        return view('products.import-product');
    }
    
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request) 
    {
        $import = Excel::import(new ProductsImport, $request->file('products_import'));
        if ($import) {
            toast('Successfully Import Done!','success');
            return redirect()->route('products.index');
        }else{
            toast('Something is wrong!','error');
            return redirect()->back();
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            unlink($product->image);
        }
        $product->delete();
        return redirect()->back();
    }
}
