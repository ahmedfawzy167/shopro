@extends('layouts.master')

@section('page-title')
  {{trans('admin.New Permission')}}
@endsection

@section('page-content')

<div class="card">

 <div class="container card-body">
  <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-plus"></i> {{trans('admin.Add New Permission')}}</h1>
  <form action="{{route('permissions.store')}}" method="post" class="row">
    @csrf

    <div class="form-group col-md-12">
      <label for="permission_name">{{trans('admin.Permission Name')}}</label>
      <input type="text" name="permission_name" id="permission_name" class="form-control @error('permission_name') is-invalid @enderror">
      @error('permission_name')
        <strong class="invalid-feedback">
          {{ $message }}
        </strong>
      @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="role_name">{{trans('admin.Role Name')}}</label>
        <input type="text" name="role_name" id="role_name" class="form-control @error('permission_name') is-invalid @enderror">
        @error('role_name')
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
