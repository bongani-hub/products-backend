<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
    
{
    //
    function addProduct(Request $req)
    {
        $product= new Product;
        $product->name = $req->input('name');
        $product->description = $req->input('description');
        $product->file_path = $req->file('file')->store('products');
        $product->save();
        
        return $product;
;
    }
    function list(){
        return Product::all();
    }
    function delete($id)
    {
        $result = Product::where("id",$id)->delete();
        if($result)
        {
            return ["result"=>"product has been deleted"];
        }
        else{ 
            return ["result"=>"failed"];
        }
    }
    function getProduct($id){
            return Product::find($id);
    }
    function updateProduct($id, Request $req)
    {
        $product= new Product;
        $product->name = $req->input('name');
        $product->description = $req->input('description');
        if($req->file('file')){
            $product->file_path=$req->file('file')->store('products');
        }
        $product->save();
        
        return $product;

    }
}
