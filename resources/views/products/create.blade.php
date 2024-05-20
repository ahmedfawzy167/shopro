@extends('layouts.master')

@section('page-title')
  {{__('admin.New Product')}}
@endsection

@section('page-content')

<div class="card">
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
  <div class="container card-body">
   <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-plus"></i> {{__('admin.Add New Product')}}</h1>
   <form action="{{route('products.store')}}" method="post" class="row">
    @csrf
    <div class="form-group col-12">
      <label for="name">{{__('admin.Product Name')}}<span class="text-danger ms-2">*</span></label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
      @enderror
    </div>

    <div class="form-group col-12">
      <label for="description">{{__('admin.Product Description')}}<span class="text-danger ms-2">*</span></label>
      <textarea class="form-control @error('description') is-invalid @enderror"
      rows="20" cols="15" name="description" id="summernote">{{ old('description') }}</textarea>
        @error('description')
         <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
        @enderror
    </div>

    <div class="form-group col-6">
      <label for="cost">{{__('admin.Product Cost')}}<span class="text-danger ms-2">*</span></label>
      <input type="text" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror">
      @error('cost')
        <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
      @enderror
    </div>

    <div class="col-6">
      <label for="price">{{__('admin.Product Price')}}<span class="text-danger ms-2">*</span></label>
      <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror">
      @error('price')
         <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
      @enderror
      </div>

    <div class="form-group col-6">
     <label for="stock">{{__('admin.Product Stock')}}<span class="text-danger ms-2">*</span></label>
     <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror">
      @error('stock')
       <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
      @enderror
    </div>

    <div class="form-group col-6">
     <label for="subcategory_id">{{__('admin.Product Category')}}<span class="text-danger ms-2">*</span></label>
     <select name="subcategory_id" id="subcategory_id" class="form-select">
       @foreach($subcategories as $subcategory)
         <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
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
