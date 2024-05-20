@extends('layouts.master')

@section('page-title')
   {{trans('admin.Edit Brand')}}
@endsection

@section('page-content')

<div class="card">
  <div class="container card-body">
  <h1 class="text-center text-light bg-success"><i class="fa-solid fa-pen-to-square"></i> {{trans('admin.Edit Brand')}}</h1>
  <form action="{{route('brands.update',$brand->id)}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group col-md-12">
      <label for="name">{{trans('admin.Brand Name')}}</label>
      <input type="text" name="name" id="name" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror">
      @error('name')
       <strong class="invalid-feedback" role="alert">{{ $message }}</strong>
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
       <button type="submit" class="btn btn-primary btn-lg">{{trans('admin.Update')}}</button>
       <button type="reset" class="btn btn-secondary btn-lg">{{trans('admin.Reset')}}</button>
    </div>

</form>
</div>
</div>

@endsection
