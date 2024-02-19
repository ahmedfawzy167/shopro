@extends('layouts.master')

@section('page-title')
  {{__('admin.Show Sku')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-success"><i class="fa-solid fa-eye"></i> {{__('admin.Sku Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{__('admin.Name')}}: {{$sku->name}}</li>
        <li class="list-group-item">{{__('admin.Image')}}: <img src="{{asset('storage/'.$sku->image)}}" width="80px"></li>
        <li class="list-group-item">{{__('admin.Price')}}: ${{$sku->product->price}}</li>
        <li class="list-group-item">{{__('admin.Stock')}}: {{$sku->product->stock}}Q</li>

      </ul>
    </div>
  </div>
  <div class="text-center mt-2">
     <a href="{{route('skus.index')}}" class="btn btn-success">{{__('admin.Back to List')}}</a>
  </div>






@endsection
