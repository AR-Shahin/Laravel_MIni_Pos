<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::latest()->get();
        return view('category.index',$this->data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','unique:categories'],
        ]);
        $cat = new Category();
        $cat->title = $request->title;
        if($cat->save()){
            $this->setSuccessMessage('Category Added Successfully!');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
        ]);
        $cat = Category::find($id);
        $cat->title = $request->title;
        if($cat->save()){
            $this->setSuccessMessage('Category Updated Successfully!');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if(Category::find($id)->delete()){
            $this->setSuccessMessage('Category Deleted Successfully!');
            return redirect()->back();
        }
    }
}
