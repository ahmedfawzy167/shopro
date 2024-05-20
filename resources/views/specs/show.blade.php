@extends('layouts.master')

@section('page-title')
  {{__('admin.Show Spec')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Spec Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{__('admin.Name')}}: {{$spec->name}}</li>
        <li class="list-group-item">{{__('admin.Spec Category')}}: {{$spec->specCategory->name}}</li>
      </ul>
    </div>
  </div>
  <div class="text-center mt-2">
     <a href="{{route('specs.index')}}" class="btn btn-info">{{__('admin.Back to List')}}</a>
  </div>

@endsection
