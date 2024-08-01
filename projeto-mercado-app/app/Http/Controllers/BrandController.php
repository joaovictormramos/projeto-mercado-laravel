<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    function getBrands()
    {
        $brands = Brand::orderBy('brand_name')->get();
        return view("/admin/brands", compact('brands'));
    }

    function formRegisterBrand()
    {
        $brand = new Brand();
        $brand->id = 0;
        return view("/admin/update_brand", compact('brand'));
    }

    function registerBrand(Request $request)
    {   
        if ($request->input('id') == 0) {
            $brand = new Brand();
        } else {
            $brand = Brand::find($request->input('id'));
        }
        $brand->brand_name = $request->input('name');
        $brand->save();
        return redirect('/marcas');
    }

    function formUpdateBrand($id)
    {
        $brand = Brand::find($id);
        return view('/admin/update_brand', compact('brand'));
    }

    public function deleteBrand($id)
    {
        $product = Brand::find($id);
        $product->delete();
        return redirect('/marcas');
    }
}
