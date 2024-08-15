<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Package;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::orderBy('product_name')->get();
        return view('/admin/products', compact('products'));
    }

    public function formRegisterProduct()
    {
        $product = new Product();
        $product->id = 0;
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/register_product', compact('product', 'brands', 'sections', 'packages'));
    }

    public function registerProduct(Request $request)
    {
        if ($request->input('id') == 0) {
            $product = new Product();
        } else {
            $product = Product::find($request->input('id'));
        }

        if ($request->hasFile('product_img')) {
            $img = $request->file('product_img');
            $path = $img->store('public/images');
            $arrayImg = explode('/', $path);
            $fileName = end($arrayImg);
            if ($product->product_img != "") {
                Storage::delete("public/images/" . $product->product_img);
            }
            $product->product_img = $fileName;
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

    public function formUpdateProduct($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $sections = Section::all();
        $packages = Package::all();
        return view('/admin/register_product', compact('product', 'brands', 'sections', 'packages'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->product_img != "") {
            Storage::delete("public/images/" . $product->product_img);
        }
        $product->delete();
        return redirect('/produtos');
    }
}
