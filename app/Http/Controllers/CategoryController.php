<?php

namespace App\Http\Controllers;

use App\Http\Tools\ImportPhoto;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::latest()->paginate(10);
        return view('',compact($categorys));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'parent_id' => ['numeric'],
        ]);

        $category = Category::create([
            'title' => $request->title,
            'photo' => ImportPhoto::photo($request->file('photo'),'Photos/Categorys',400,400),
            'parent_id' => $request->parent_id,
            'slug'  => Str::slug($request->title.Str::random(15)),
        ]);

        return redirect()->route('');
    }

    public function show($slug)
    {
        $category = Category::where('slug',$slug);
        return view('',compact($category));
    }

    public function edit($slug)
    {
        $category = Category::where('slug',$slug);
        return view('',compact($category));
    }

    public function update(Request $request, $slug)
    {
        $category = Category::where('slug',$slug);
        $category->update([
            'title' => $request->title,
            'photo' => ImportPhoto::photo_update($request->file('photo'),'Photos/Categorys',500,500,$category->photo),
            'parent_id' => $request->parent_id,
        ]);
        Session::flash('msg_update','Updated Category Successful');
        return redirect()->route('');
    }

    public function destroy($slug)
    {
        $category = Category::where('slug',$slug)->delate();
        Session::flash('msg_destroy','Trashed Category Successful');
        return redirect()->route('');
    }

    public function trashed()
    {
        $categorys = Category::onlyTrashed()->paginate(10);
        return view('',compact($categorys));
    }
    public function restore($slug)
    {
        $category = Category::withTrashed()
            ->where('slug', $slug)
            ->restore();
        Session::flash('msg_restore','Restore Category Successful');
        return redirect()->route('');
    }
    public function hard_delete($slug)
    {
        $category = Category::withTrashed()
            ->where('slug', $slug)
            ->forceDelete();
        ImportPhoto::photo_remove($category->photo);
        Session::flash('msg_h_delete','Hard delete Category Successful');
        return redirect()->route('');
    }
}
