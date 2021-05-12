<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::query()->with('brand')->latest('id')->paginate();
        return view('admin.inventory.index', compact('inventories'));
    }

    public function create()
    {
        $inventory = null;
        $brands = Brand::query()->pluck('name', 'id');
        return view('admin.inventory.form', compact('inventory', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required',
        ]);

        try {
            Inventory::query()->create($request->all());
            return redirect('/inventories');
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
    public function edit($id)
    {
        $inventory = Inventory::query()->findOrFail($id);
        $brands = Brand::query()->pluck('name', 'id');
        return view('admin.inventory.form', compact('inventory', 'brands'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'purchase_date' => 'required',
        ]);

        try {
            Inventory::query()->find($id)->update($request->all());
            return redirect('/inventories');
        } catch (\Exception $exception){
            return redirect()->back();
        }
    }
}
