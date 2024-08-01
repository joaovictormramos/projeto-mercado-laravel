<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function getStores()
    {
        $stores = Store::orderBy('store_name')->get();
        return view('/admin/stores', compact('stores'));
    }

    public function formRegisterStore()
    {
        $store = new Store();
        $store->id = 0;
        return view('/admin/register_store', compact('store'));
    }

    public function registerStore(Request $request)
    {
        if ($request->input('id') == 0) {
            $store = new Store();
        } else {
            $store = Store::find($request->input('id'));
        }
        $store->store_name = $request->input('name');
        $store->store_address = $request->input('address');
        $store->save();
        return redirect('/estabelecimentos');
    }

    public function formUpdateStore($id)
    {
        $store = Store::find($id);
        return view('/admin/update_store', compact('store'));
    }

    public function deleteStore($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect('/estabelecimentos');
    }

}
