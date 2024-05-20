@extends('layouts.master')

@section('page-title')
  {{__('admin.Show Permission')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="container card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Show Permission')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h2 class="list-group-item">{{__('admin.Permission')}}: {{ $permission->name}}</h2>
        <h2 class="list-group-item">{{__('admin.Role')}}: @foreach ($roles as $role)
            {{ $role->name }}
        @endforeach</h2>
      </ul>
    </div>
  </div>
  <div class="text-center my-2">
    <a href="{{route('permissions.index')}}" class="btn btn-info btn">{{__('admin.Back to List')}}</a>
 </div>

@endsection
