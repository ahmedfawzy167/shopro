@extends('layouts.master')

@section('page-title')
  Show Customer
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-success"><i class="fa-solid fa-eye"></i> Customer Details</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Customer Name: {{$customer->name}}</li>
        <li class="list-group-item">Customer Phone: {{$customer->phone}}</li>
        <li class="list-group-item">Customer Address: {{$customer->address}}</li>
        <li class="list-group-item">Customer City: {{$city->name}}</li>
        <li class="list-group-item">PDF File:
            <embed src="{{ asset('storage/' . $customer->image) }}" width="70%" height="500px" type="application/pdf">
        </li>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('customers.index')}}" class="btn btn-success mt-2">Back to List</a>
  </div>

@endsection
