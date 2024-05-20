@extends('layouts.master')

@section('page-title')
  {{trans('admin.New Brand')}}
@endsection

@section('page-content')

<div class="card">
 <div class="container card-body">
  <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-plus"></i> {{trans('admin.Add New Brand')}}</h1>
  <form action="{{route('brands.store')}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-md-12">
      <label for="name">{{trans('admin.Brand Name')}}</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <strong class="invalid-feedback">
          {{ $message }}
        </strong>
      @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="image">{{trans('admin.Brand Image')}}</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
          <strong class="invalid-feedback" role="alert">
            {{ $message }}
          </strong>
        @enderror
      </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">{{trans('admin.Add')}}</button>
        <button type="reset" class="btn btn-secondary btn-lg">{{trans('admin.Reset')}}</button>
    </div>
</form>
</div>
</div>
@endsection
