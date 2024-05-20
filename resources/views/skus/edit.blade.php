@extends('layouts.master')

@section('page-title')
  {{__('admin.Edit Sku')}}
@endsection

@section('page-content')

<div class="card">
 <div class="container card-body">
  <h1 class="text-center text-light bg-success"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.Edit Sku')}}</h1>
  <form action="{{route('skus.update',$sku->id)}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group col-md-12">
      <label for="name">{{__('admin.Sku Name')}}<span class="text-danger ms-2">*</span></label>
      <input type="text" name="name" id="name"class="form-control @error('name') is-invalid @enderror" value="{{$sku->name}}">
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="images">{{__('admin.Sku Image')}}<span class="text-danger ms-2">*</span></label>
        <strong class="text-muted">Max 5 images only</strong>
        @foreach($sku->images as $image)
          <img src="{{asset('storage/' .$image->path)}}" width="50px">
        @endforeach
        <input type="file" multiple name="images[]" id="images" class="form-control mt-2 @error('images') is-invalid @enderror">
        @error('images')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="product_id">{{__('admin.Sku Product')}}<span class="text-danger ms-2">*</span></label>
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
