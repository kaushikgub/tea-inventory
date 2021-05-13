@extends('layouts.app')
@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/brands') }}">Brands</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    {!! Form::model($brand, ['url' => $brand ? '/brands/' . $brand->id : '/brands/store', 'method' => $brand ? 'PUT' : 'POST', 'files' => true]) !!}
    <div class="row">
        <div class="col-md-6 col-sm-12 form-group">
            <label for="">Name</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <label for="">Image</label>
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <label for="">Address</label>
            {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <button type="submit" class="btn btn-success float-right">{{ $brand ? 'Update' : 'Save' }}</button>
            <a href="{{ url('/brands') }}" class="btn btn-warning float-right mr-1">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
