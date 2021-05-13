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
        $search = null;
        $inventories = Inventory::query()->with('brand')->latest('id')->paginate();
        return view('admin.inventory.index', compact('inventories', 'search'));
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

    public function destroy($id)
    {
        try {
            Inventory::query()->find($id)->delete();
            return redirect('/inventories');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('query');
        $inventories = Inventory::query()
            ->when($search, function ($query) use ($search){
                $query->whereHas('brand', function ($query) use ($search){
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
                $query->orWhere('quantity', 'LIKE', '%' . $search . '%');
                $query->orWhere('purchase_date', 'LIKE', '%' . $search . '%');
                $query->orWhere('comment', 'LIKE', '%' . $search . '%');
                $query->orWhereHas('user', function ($query) use ($search){
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
            })
            ->latest('id')
            ->paginate(10);
        return view('admin.inventory.index', compact('inventories', 'search'));
    }
}
