@extends('layouts.master')

@section('page-title')
  {{__('admin.Edit Sku')}}
@endsection

@section('page-content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="card">
<div class="container card-body">
  <h1 class="text-center text-light bg-dark"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.Edit Sku')}}</h1>
  <form action="{{route('skus.update',$sku->id)}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group col-md-12">
      <label for="name">{{__('admin.Sku Name')}}</label>
      <input type="text" name="name" id="name"class="form-control @error('name') is-invalid @enderror" value="{{$sku->name}}">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="image">{{__('admin.Sku Image')}}</label>
      <img src="{{asset('storage/'.$sku->image)}}" class="rounded-circle" width="100px">
      <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
      @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="product_id">{{__('admin.Sku Product')}}</label>
      <select name="product_id" id="product_id" class="form-select">
        @foreach($products as $product)
          <option value="{{$product->id}}" {{$product->id == $sku->product_id ? 'selected' : ''}}>{{$product->name}}</option>
        @endforeach
      </select>
      </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">{{__('admin.Update')}}</button>
            <button type="reset" class="btn btn-secondary btn-lg">{{__('admin.Reset')}}</button>
        </div>

</form>
</div>
</div>

@endsection
