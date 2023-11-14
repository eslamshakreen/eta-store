<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }


    public function store()
    {
        $p = new Product;

        $p->name = request('name');
        $p->price = request('price');;
        $p->description = request('description');
        $p->category_id = request('category_id');

        $p->save();
    }


    public function show($id)
    {
        return Product::find($id);
    }


    public function update( $id)
    {

        $p = Product::find($id);
        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');
        $p->category_id = request('category_id');
        $p->save();

        return $p;
    }

    public function destroy($id)
    {
        $p = Product::find($id);
        $p->delete();
    }


    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
