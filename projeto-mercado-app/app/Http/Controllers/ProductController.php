<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Brand;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getProducts()
    {
        $products = Product::orderBy('product_name')->get();
        return view('/admin/products', compact('products'));
    }

    function formRegisterProduct() 
    {   
        $product = new Product();
        $product->id = 0;
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/register_product', compact('product', 'brands', 'sections', 'packages'));
    }

    function registerProduct(Request $request)
    {
        if ($request->input('id') == 0) {
            $product = new Product();
        } else {
            $product = Product::find($request->input('id'));
        }
        $product->product_name = $request->input('name');
        $product->brand_id = $request->input('brand_id');
        $product->product_description = $request->input('description');
        $product->product_measurement = $request->input('measurement');
        $product->product_unity_measurement = $request->input('unity_measurement');
        $product->package_id = $request->input('package');
        $product->section_id = $request->input('section');
        $product->save();
        return redirect('/produtos');
    }

    function formUpdateProduct($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/update_product', compact('product', 'brands', 'sections', 'packages'));
    }

    function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/produtos');
    }
}
