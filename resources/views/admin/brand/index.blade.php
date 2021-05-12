@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ url('/brands/create') }}" class="btn btn btn-facebook"><i class="fa fa-plus-circle"></i> Add</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <table class="table align-items-center table-dark table-flush">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Stock</th>
                    <th style="width: 100px">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($brands as $brand)
                    <tr>
                        <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <img style="height: 30px" class="img-fluid" src="{{ asset('storage/'.$brand->image) }}"
                                 alt="{{ $brand->name }}">
                        </td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->address }}</td>
                        <td>{{ $brand->stock ?? 0 }}</td>
                        <td>
                            <a href="{{ url('brands/' . $brand->id . '/edit') }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Data Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col d-flex justify-content-center">
            {{ $brands->links() }}
        </div>
    </div>
@endsection
