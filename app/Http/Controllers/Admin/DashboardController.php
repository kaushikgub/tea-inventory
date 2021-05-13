<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $brandStock = 0;
        $brandCount = count($brands);
        foreach ($brands as $brand) {
            $brandStock += (int)$brand['stock'];
        }

        $inventoryStock = Inventory::query()->whereMonth('purchase_date', Carbon::now()->month)->sum('quantity');
        $saleStock = Sale::query()->whereMonth('sale_date', Carbon::now()->month)->sum('quantity');
        $userCount = User::query()->count() - 1;

        return view('admin.dashboard.index', compact(
                'brandStock',
                'brandCount',
                'inventoryStock',
                'saleStock',
                'userCount'
            )
        );
    }
}
