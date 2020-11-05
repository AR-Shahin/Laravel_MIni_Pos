<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Products';
        $this->data['sub_menu'] = 'Product';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::latest()->get();
        $this->data['products'] = Product::latest()->get();
        return view('product.index',$this->data);
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','unique:products'],
            'cat_id' => ['required'],
            'description' => ['required'],
            'unit' => ['required'],
            'cost_price' => ['required'],
            'price' => ['required'],
        ]);
        $pdct = new Product();
        $pdct->title = ucwords($request->title);
        $pdct->cat_id = $request->cat_id;
        $pdct->description = ucwords($request->description);
        $pdct->unit = strtoupper($request->unit);
        $pdct->cost_price = $request->cost_price;
        $pdct->price = $request->price;
        if($pdct->save()){
            $this->setSuccessMessage('Product Added Successfully!');
            return redirect()->back();
        }
    } 
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'cat_id' => ['required'],
            'description' => ['required'],
            'unit' => ['required'],
            'cost_price' => ['required'],
            'price' => ['required'],
        ]);
        $pdct = Product::findorFail($id);
        $pdct->title = ucwords($request->title);
        $pdct->cat_id = $request->cat_id;
        $pdct->description = ucwords($request->description);
        $pdct->unit = strtoupper($request->unit);
        $pdct->cost_price = $request->cost_price;
        $pdct->price = $request->price;
        if($pdct->save()){
            $this->setSuccessMessage('Product Updated Successfully!');
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
        if(Product::find($id)->delete()){
            $this->setSuccessMessage('Category Deleted Successfully!');
            return redirect()->back();
        }
    }
}
