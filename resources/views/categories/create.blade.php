@extends('layouts.master')

@section('page-title')
  {{trans('admin.New Category')}}
@endsection

@section('page-content')

<div class="card">

 <div class="container card-body">
  <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-plus"></i> {{trans('admin.Add New Category')}}</h1>
  <form action="{{route('categories.store')}}" method="post" class="row">
    @csrf
    <div class="form-group col-md-12">
      <label for="name">{{trans('admin.Category Name')}}</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <strong class="invalid-feedback">
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
