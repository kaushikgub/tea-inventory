@extends('layouts.app')
@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sales</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <a href="{{ url('/sales/create') }}" class="btn btn btn-facebook"><i class="fa fa-plus-circle"></i> Add</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <table class="table align-items-center table-dark table-flush">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Brand Name</th>
                    <th>Quantity</th>
                    <th>Sales Date</th>
                    <th>Comment</th>
                    <th>Insert By</th>
                    <th style="width: 100px">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $sale->brand->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ $sale->sale_date ? date_format(date_create($sale->sale_date), 'd - M - Y') : 'N/A' }}</td>
                        <td>{{ $sale->comment ?? 'N/A' }}</td>
                        <td>{{ $sale->user->name }}</td>
                        <td>
                            <a href="{{ url('sales/' . $sale->id . '/edit') }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" id="delete" data-url="{{ url('sales/' . $sale->id) }}" class="btn btn-sm btn-danger">
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
            {{ $sales->links() }}
        </div>
    </div>
@endsection
