@extends('layouts.master')

@section('page-title')
   {{__('admin.Show Brand')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Brand Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">{{__('admin.Brand Name')}}:  {{$brand->name}}</h4>
        <h5 class="list-group-item">{{__('admin.Brand Image')}}: <img src="{{asset('storage/'.$brand->image)}}" width="100pxs">
      </h5>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('brands.index')}}" class="btn btn-info mt-2">{{__('admin.Back to List')}}</a>
  </div>


@endsection
