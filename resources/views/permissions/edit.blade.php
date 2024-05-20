@extends('layouts.master')

@section('page-title')
  {{trans('admin.Edit Permission')}}
@endsection

@section('page-content')

<div class="card">

 <div class="container card-body">
  <h1 class="text-center bg-success text-white"><i class="fa-solid fa-pen-to-square"></i>  {{trans('admin.Edit Permission')}}</h1>
  <form action="{{route('permissions.update',$permission->id)}}" method="post" class="row">
    @csrf
    @method('PUT')

    <div class="form-group col-md-12">
      <label for="permission_name">{{trans('admin.Permission Name')}}</label>
      <input type="text" name="permission_name" id="permission_name" value="{{$permission->name}}" class="form-control @error('permission_name') is-invalid @enderror">
      @error('permission_name')
        <strong class="invalid-feedback">
          {{ $message }}
        </strong>
      @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="role_id">{{__('admin.Role')}}</label>
        <select class="form-select" name="role_id" id="role_id">
          @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
          @endforeach
        </select>
     </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">{{trans('admin.Update')}}</button>
        <button type="reset" class="btn btn-secondary btn-lg">{{trans('admin.Reset')}}</button>
    </div>

</form>
</div>
</div>
@endsection
