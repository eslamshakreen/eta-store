<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create_category(){
        return view('categories/create_category');
    }

    public function store_category(){

        $image_path = request('image')->store('categories_images');
        $cats = new category;
        $cats->name = request('name');
        $cats->image = $image_path;
        $cats->save();
        return redirect('products');
    }

    public function show_categories(){
        $cats = category::all();
        return view('categories/show_categories')->with('categories',$cats);

    }
    public function show_category_products($id){
        $cat =  Category::find($id);
        return view('categories/show_category_products')->with('category',$cat);

    }
    //
}
