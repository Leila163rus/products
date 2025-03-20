<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\ProductRules;
use Illuminate\Http\RedirectResponse;

class ProductsController extends Controller
{
    public function main():View 
    {
       $products=Products::cursor();
       return view('products.products', ['products'=>$products]); 
    }

    public function form():View 
    {
        $categories=Categories::cursor();
        return view('products.create', ['categories'=>$categories]);
    }

    public function create(ProductRules $rules):RedirectResponse
    {
        Products::create($rules->validated());
        return redirect()->route('products.products')->with('success', 'Product created');   
    }

    public function show(Request $request):View
    {   
        $product=Products::where('id', $request->id)->get();
        $category=Categories::find($product);
        return view('products.show', ['product'=>$product, 'category'=>$category]);
    }

    public function edit(Request $request):View
    {
        $product=Products::where('id', $request->id)->get();
        $category_id=Categories::find($product);
        $category=Categories::cursor();
        return view('products.edit', ['product'=>$product, 'category'=>$category, 'category_id'=>$category_id]);
    }

    public function update(Request $request, ProductRules $rules):RedirectResponse 
    {
        Products::where('id', $request->id)->update($rules->validated());
        return redirect()->route('products.products')->with('success','Product updated');
    }

    public function delete(Request $request):RedirectResponse
    {
        Products::where('id', $request->id)->delete();
        return redirect()->route('products.products')->with('success', 'Product deleted');  
    }
}
