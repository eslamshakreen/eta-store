<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        
        return view('products/index')->with('data', Product::latest('id')->get());
    }

    public function create(){

        $cats = category::all();
        return view('products/create')->with('categories',$cats);
    }
    public function store(Request $request)
    {
        $image_path = request('image')->store('product_images');
        $p = new Product;



        $p->name = request('name');
        $p->price = request('price');;
        $p->description = request('description');
        $p->image = $image_path;
        $p->category_id = request('category_id');

        $p->save();
        return redirect('products');
        
    }
    public function details($id)
    {
        $p = new Product;
        $data = $p->find($id);

        return view('products/details')->with('data',$data);
        
        
    }

    public function destroy_product($id){
        $p = Product::find($id);
        $p->delete();
        return redirect('products');
    }

    public function edit_product($id){
        $p = Product::find($id);
        $cats = Product::all();
        return view('products/edit')->with('product',$p)->with('categories',$cats);
    }

    public function update_product($id){

        $image_path = request('image')->store('product_images');

        $p = Product::find($id);
        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');
        $p->image = $image_path;
        $p->category_id = request('category_id');
        $p->save();

        return redirect('products');

    }


}
