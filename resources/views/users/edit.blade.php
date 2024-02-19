@extends('layouts.master')

@section('page-title')
  {{__('admin.Edit User')}}
@endsection

@section('page-content')
<div class="card">
<div class="container card-body">
  <h1 class="text-center text-light bg-dark"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.Edit User')}}</h1>
  <form action="{{route('users.update',$user->id)}}" method="post" class="row">
    @csrf
    @method('PUT')

    <div class="form-group col-12">
      <label for="name">{{__('admin.User Name')}}</label>
      <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control @error('email') is-invalid @enderror">
      @error('name')
         <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="email">{{__('admin.Email')}}</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
         <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-6">
        <label for="type_id">{{__('admin.User Type')}}</label>
        <select name="type_id" id="type_id" class="form-select">
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $user->type_id == $type->id ? 'selected' : '' }}>
              {{ $type->name }}
            </option>
            @endforeach
        </select>
      </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">{{__('admin.Update')}}</button>
            <button type="reset" class="btn btn-secondary btn-lg">{{__('admin.Reset')}}</button>
        </div>

</form>


@endsection
