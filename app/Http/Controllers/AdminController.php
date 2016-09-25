<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Category;
use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }
    public function user(){
        return view('admin.user');
    }
    public function product_category(){
        return view('admin.product_category');
    }
    public function store(Request $request,Product_Category $product_category)
    {
        $category = new Product_Category;
        $category->title=$request->title;
        $category->save();
        $categories = Product_Category::all();
        return view('/admin/product_category',compact('categories'));
    }
    
}
