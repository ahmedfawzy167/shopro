@extends('layouts.master')

@section('page-title')
  {{__('admin.New Sku')}}
@endsection

@section('page-content')

<div class="card">
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="card-body container">
  <h1 class="text-center bg-primary text-white mt-3"><i class="fa-solid fa-plus"></i> {{__('admin.Add New Sku')}}</h1>
  <form action="{{route('skus.store')}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-md-12">
      <label for="name">{{__('admin.Sku Name')}}</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
       @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="image">{{__('admin.Sku Image')}}</label>
      <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
       @enderror
    </div>
    @error('product_id')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
     <div class="form-group col-md-12">
        <label for="product_id">{{__('admin.Sku Product')}}</label>
        <select name="product_id" id="product_id" class="form-select">
            @foreach($products as $product)
             <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
         </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">{{__('admin.Add')}}</button>
            <button type="reset" class="btn btn-secondary btn-lg">{{__('admin.Reset')}}</button>
        </div>

</form>
</div>
</div>
@endsection
