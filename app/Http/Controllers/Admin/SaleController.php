<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::query()->with('brand')->latest('id')->paginate();
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {
        $sale = null;
        $brands = Brand::query()->pluck('name', 'id');
        return view('admin.sale.form', compact('sale', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sale_date' => 'required',
        ]);

        try {
            Sale::query()->create($request->all());
            return redirect('/sales');
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
    public function edit($id)
    {
        $sale = Sale::query()->findOrFail($id);
        $brands = Brand::query()->pluck('name', 'id');
        return view('admin.sale.form', compact('sale', 'brands'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sale_date' => 'required',
        ]);

        try {
            Sale::query()->find($id)->update($request->all());
            return redirect('/sales');
        } catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Sale::query()->find($id)->delete();
            return redirect('/sales');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
