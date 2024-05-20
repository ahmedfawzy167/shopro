@extends('layouts.master')

@section('page-title')
   {{__('admin.New Subcategory')}}
@endsection

@section('page-content')

<div class="card">
 <div class="card-body container">
    <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-plus"></i> {{__('admin.Add New Subcategory')}}</h1>
    <form action="{{route('subcategories.store')}}" method="post" class="row" enctype="multipart/form-data">
     @csrf
      <div class="form-group col-md-12">
       <label for="name">{{__('admin.Subcategory Name')}}</label>
       <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
       @error('name')
        <strong class="invalid-feedback">{{ $message }}</strong>
       @enderror
      </div>
      <div class="form-group col-md-12">
        <label for="image">{{__('admin.Subcategory Image')}}</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
         <strong class="invalid-feedback">{{ $message }}</strong>
        @enderror
      </div>

      <div class="form-group col-md-12">
        <label for="category_id">{{__('admin.Category Name')}}</label>
        <select name="category_id" id="category_id" class="form-select">
            @foreach($categories as $category)
             <option value="{{$category->id}}">{{$category->name}}</option>
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
