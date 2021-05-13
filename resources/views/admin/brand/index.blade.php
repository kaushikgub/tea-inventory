@extends('layouts.app')
@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Brands</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <a href="{{ url('/brands/create') }}" class="btn btn btn-facebook"><i class="fa fa-plus-circle"></i> Add</a>
{{--            <a href="{{ url('/brands/export') }}" class="btn btn-success"><i class="fas fa-file-export"></i> Export</a>--}}
        </div>
        <div class="col">
            <form action="{{ url('brands/search') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search" value="{{ $search }}">
                    <div class="input-group-append">
                        <button class="btn btn-facebook" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
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
                            <a href="javascript:void(0)" id="delete" data-url="{{ url('brands/' . $brand->id) }}" class="btn btn-sm btn-danger">
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
