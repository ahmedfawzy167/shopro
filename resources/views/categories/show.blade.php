@extends('layouts.master')

@section('page-title')
   {{__('admin.Show Category')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Category Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <h4 class="list-group-item">{{__('admin.Category Name')}}:  {{$category->name}}</h4>
        <h5 class="list-group-item">{{__('admin.All Subcategories')}}:
        <ul>
            @foreach($category->subcategories as $subcategory)
             <li>{{ $subcategory->name }}</li>
            @endforeach
        </ul>
      </h5>
      </ul>
    </div>
  </div>
  <div class="text-center">
     <a href="{{route('categories.index')}}" class="btn btn-info mt-2">{{__('admin.Back to List')}}</a>
  </div>






@endsection
