@extends('layouts.master')

@section('page-title')
   {{__('admin.Edit Product')}}
@endsection

@section('page-content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
<div class="card">
 <div class="container card-body">
   <h1 class="text-center text-light bg-dark"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.Edit Product')}}</h1>
   <form action="{{ route('products.update',$product->id) }}" method="post" class="row">
    @csrf
    @method('PUT')

    <div class="form-group col-md-12">
      <label for="name">{{__('admin.Product Name')}}</label>
      <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror">
      @error('name')
       <strong class="invalid-feedback">{{ $message }}</strong>
      @enderror
    </div>

    <div class="form-group col-md-12">
      <label for="description">{{__('admin.Product Description')}}</label>
      <textarea name="description" id="description" cols="15" rows="10" class="form-control @error('description') is-invalid @enderror">{{$product->description}}</textarea>
      @error('description')
       <strong class="invalid-feedback">{{ $message }}</strong>
      @enderror
    </div>

    <div class="form-group col-md-6">
      <label for="cost">{{__('admin.Product Cost')}}</label>
      <input type="number" name="cost" id="cost" value="{{$product->cost}}" class="form-control @error('cost') is-invalid @enderror">
      @error('cost')
       <strong class="invalid-feedback">{{ $message }}</strong>
      @enderror
    </div>

    <div class="form-group col-md-6">
      <label for="price">{{__('admin.Product Price')}}</label>
      <input type="number" name="price" id="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
      @error('price')
       <strong class="invalid-feedback">{{ $message }}</strong>
      @enderror
      </div>

      <div class="form-group col-md-6">
        <label for="stock">{{__('admin.Product Stock')}}</label>
        <input type="number" name="stock" id="stock" value="{{$product->stock}}" class="form-control @error('stock') is-invalid @enderror">
        @error('stock')
         <strong class="invalid-feedback">{{ $message }}</strong>
        @enderror
     </div>

     <div class="form-group col-md-6">
        <label for="sub_category_id">{{__('admin.Product Category')}}</label>
        <select class="form-select" name="sub_category_id" id="sub_category_id">
          @foreach($subCategories as $subcategory)
            <option value="{{$subcategory->id}}" {{$product->sub_category_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
          @endforeach
        </select>
         @error('sub_category_id')
          <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg">{{__('admin.Update')}}</button>
          <button type="reset" class="btn btn-secondary btn-lg">{{__('admin.Reset')}}</button>
        </div>

</form>
</div>
</div>

@endsection
