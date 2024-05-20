@extends('layouts.master')

@section('page-title')
   {{__('admin.Show Subcategory')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Subcategory Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">{{__('admin.Subcategory Name')}}: {{$subcategory->name}}</h4>
        <h4 class="list-group-item">{{__('admin.Category Name')}}: {{$subcategory->category->name}}</h4>
        <h6 class="list-group-item">{{__('admin.All Products')}}:
         <ul>
              @foreach($subcategory->products as $product)
                <li>{{$product->name}}</li>
              @endforeach
         </ul>
        </h6>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('subcategories.index')}}" class="btn btn-info mt-2">{{__('admin.Back to List')}}</a>
  </div>


@endsection
