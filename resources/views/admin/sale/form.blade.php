@extends('layouts.app')
@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/sales') }}">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    {!! Form::model($sale, ['url' => $sale ? '/sales/' . $sale->id : '/sales/store', 'method' => $sale ? 'PUT' : 'POST', 'files' => true]) !!}
    <div class="row">
        <div class="col-md-4 col-sm-12 form-group">
            <label for="">Brand</label>
            {!! Form::select('brand_id', $brands, null, ['placeholder' => 'Pick a Brand', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="">Quantity</label>
            {!! Form::number('quantity', $sale ? $sale->quantity : '', ['class' => 'form-control', 'required', 'step' => '0.1']) !!}
        </div>
        <div class="col-md-4 col-sm-12 form-group">
            <label for="">Sale Date</label>
            {!! Form::date('sale_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <label for="">Comment</label>
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <button type="submit" class="btn btn-success float-right">{{ $sale ? 'Update' : 'Save' }}</button>
            <a href="{{ url('/sales') }}" class="btn btn-warning float-right mr-1">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
