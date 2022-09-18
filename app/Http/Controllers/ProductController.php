<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Http\Tools\ImportPhoto;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('',compact($products));
    }

    public function create()
    {
        return view('');
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'title' =>Str::ucfirst($request->title),
            'description' =>Str::ucfirst( $request->description),
            'photo' =>ImportPhoto::photo($request->file('photo'),'Photos/Products',500,500),
            'main_price' =>$request->main_price,
            'main_discount' => $request->main_discount
        ]);
        return redirect()->route('');
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug);
        return view('',compact($product));
    }

    public function edit($slug)
    {
        $product = Product::where('slug',$slug);
        return view('',compact($product));
    }

    public function update(UpdateProductRequest $request, $slug)
    {
        $product = Product::where('slug',$slug);
        $product->update([
            'category_id' => $request->category_id,
            'title' =>Str::ucfirst($request->title),
            'description' =>Str::ucfirst( $request->description),
            'photo' =>ImportPhoto::photo_update($request->file('photo'),'Photos/Products',500,500,$product->photo),
            'main_price' =>$request->main_price,
            'main_discount' => $request->main_discount
        ]);
        Session::flash('msg_update','Updated Product Successful');
        return redirect()->route('');
    }

    public function destroy($slug)
    {
        $product = Product::where('slug',$slug)->delate();
        Session::flash('msg_destroy','Trashed Product Successful');
        return redirect()->route('');
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(10);
        return view('',compact($products));
    }
    public function restore($slug)
    {
        $product = Product::withTrashed()
            ->where('slug', $slug)
            ->restore();
        Session::flash('msg_restore','Restore Product Successful');
        return redirect()->route('');
    }
    public function hard_delete($slug)
    {
        $product = Product::withTrashed()
            ->where('slug', $slug)
            ->forceDelete();
        ImportPhoto::photo_remove($product->photo);
        Session::flash('msg_h_delete','Hard delete Product Successful');
        return redirect()->route('');
    }
}
