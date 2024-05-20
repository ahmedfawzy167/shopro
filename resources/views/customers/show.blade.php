@extends('layouts.master')

@section('page-title')
  Show Customer
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-success text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Customer Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{__('admin.Customer Name')}}: {{$customer->name}}</li>
        <li class="list-group-item">{{__('admin.Customer Phone')}}: {{$customer->phone}}</li>
        <li class="list-group-item">{{__('admin.Customer Address')}}: {{$customer->address}}</li>
        <li class="list-group-item">{{__('admin.Customer City')}}: {{$city->name}}</li>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('customers.index')}}" class="btn btn-info mt-2">{{__('admin.Back to List')}}</a>
  </div>

@endsection
