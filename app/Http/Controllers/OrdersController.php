<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\OrderRules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Builder;

class OrdersController extends Controller
{
    protected $orders_status=['new', 'completed'];

    public function main():View 
    {
        $orders=Orders::with('products:id,name,price')->orderBy('id', 'desc')->cursor();
        foreach($orders as $order)
		{
			$total_cost=Number::format($order->products->sum('price'), 2);
		}
        return view('orders.orders', ['orders'=>$orders, 'total_cost'=>$total_cost]); 
    }

    public function form():View
    {
        $products=Products::select('id', 'name')->cursor();
        return view('orders.form', ['products'=>$products, 'orders_status'=>$this->orders_status]);
    }

    public function create(OrderRules $rules):RedirectResponse
    {
        Orders::create($rules->validated());
        return redirect()->route('orders.orders')->with('success', 'Order created');
    }

    public function show(Request $request):View
    {
        $orders=Orders::with('products')->where('id', $request->id)->get();
        $category=Categories::select('name')->find($orders)->first();
        return view('orders.show', ['orders'=>$orders, 'category'=>$category, 'orders_status'=>$this->orders_status]);    
    }
    
    public function update(Request $request, OrderRules $rules):RedirectResponse
    {
        Orders::where('id', $request->id)->update($rules->validated());
        return redirect()->route('orders.orders')->with('success','Status updated');
    }
}
