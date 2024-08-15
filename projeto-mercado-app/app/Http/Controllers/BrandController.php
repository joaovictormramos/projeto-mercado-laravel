<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function getBrands()
    {
        $brands = Brand::orderBy('brand_name')->get();
        return view("/admin/brands", compact('brands'));
    }

    public function formRegisterBrand()
    {
        $brand = new Brand();
        $brand->id = 0;
        return view("/admin/register_brand", compact('brand'));
    }

    public function registerBrand(Request $request)
    {
        if ($request->input('id') == 0) {
            $brand = new Brand();
        } else {
            $brand = Brand::find($request->input('id'));
        }
        if ($request->hasFile('brand_image')) {
            $img = $request->file('brand_image');
            $path = $img->store('public/images');
            $arrayImg = explode('/', $path);
            $fileName = end($arrayImg);
            if ($store->store != "") {
                Storage::delete("public/images/" . $brand->brand_image);
            }
            $brand->brand_image = $fileName;
        }
        $brand->brand_name = $request->input('name');
        $brand->save();
        return redirect('/marcas');
    }

    public function formUpdateBrand($id)
    {
        $brand = Brand::find($id);
        return view('/admin/register_brand', compact('brand'));
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if ($brand->brand_img != "") {
            Storage::delete("public/images/" . $brand->brand_img);
        }
        $brand->delete();
        return redirect('/marcas');
    }
}
