<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->latest('id')->paginate(10);
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        $brand = null;
        return view('admin.brand.form', compact('brand'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            $data = $request->only('name', 'address');
            $data = $this->imageUpload($request, $data);
            Brand::create($data);
            return redirect('/brands');
        } catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.form', compact('brand'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        try {
            $data = $request->only('name', 'address');
            $data = $this->imageUpload($request, $data);
            Brand::findOrFail($id)->update($data);
            return redirect('/brands');
        } catch (\Exception $exception){
            return redirect()->back();
        }
    }

    private function imageUpload(Request $request, array $data): array
    {
        if ($request->file('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'Brands/' . $request->get('name') . '/' . $fileName;
            Storage::disk('public')->put($path, File::get($request->file('image')));
            $data['image'] = $path;
        }
        return $data;
    }
}
