@extends('layouts.master')

@section('page-title')
   {{__('admin.Show City')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i>   {{__('admin.City Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">  {{__('admin.City Name')}}: {{$city->name}}</h4>
        <h6 class="list-group-item">{{__('admin.All Customers')}}:
        <ul>
            @foreach($customers as $customer)
                <li>{{$customer->name}}</li>
            @endforeach
        </ul>
        </h6>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('cities.index')}}" class="btn btn-info mt-2">{{__('admin.Back to List')}}</a>
  </div>






@endsection
