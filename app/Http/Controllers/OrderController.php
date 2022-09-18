<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('',compact($orders));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_price' => 'require|numeric',
            'shipping_price' => 'require|numeric',
            'user_id' => 'require|numeric'
        ]);
        $orders = Order::create([
            'slug' =>  Str::slug(Carbon::now().Str::random(20)),
            'user_id' => Auth::user()->id,
            'total_price' => '',
            'shipping_price' => '',
        ]);

        return redirect()->route('');
    }

    public function show($slug)
    {
        $order = Order::where('slug',$slug);
        return view('',compact($order));
    }

    public function edit($slug)
    {
        $order = Order::where('slug',$slug);
        return view('',compact($order));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'total_price' => 'require|numeric',
            'shipping_price' => 'require|numeric'
        ]);
        $order = Order::where('slug',$slug);
        $order->update([
            'total_price' => '',
            'shipping_price' => '',
        ]);

        Session::flash('msg_update','Updated Order Successful');
        return redirect()->route('');
    }
    public function destroy($slug)
    {
        $order = Order::where('slug',$slug)->delate();
        Session::flash('msg_destroy','deleted Order Successful');
        return redirect()->route('');
    }
}
