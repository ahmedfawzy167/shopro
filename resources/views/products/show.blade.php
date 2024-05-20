@extends('layouts.master')

@section('page-title')
  {{__('admin.Show Product')}}
@endsection

@section('page-content')

<div class="d-flex justify-content-center align-items-center vh-60">
    <div class="card" style="width: 60rem;">
      <div class="card-body">
        <h2 class="card-title text-center bg-info text-white"><i class="fa-solid fa-eye"></i> {{__('admin.Product Details')}}</h2>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{__('admin.Product Name')}}: {{$product->name}}</li>
        <li class="list-group-item">{{__('admin.Product Description')}}: {{$product->description}}</li>
        <li class="list-group-item">{{__('admin.Product Cost')}}: ${{$product->cost}}</li>
        <li class="list-group-item">{{__('admin.Product Price')}}: ${{$product->price}}</li>
        <li class="list-group-item">{{__('admin.Product Stock')}}: {{$product->stock}}Q</li>
        <li class="list-group-item">{{__('admin.Product Related Images')}}:
        <div class="d-flex">
            @foreach($product->skus as $sku)
                @foreach($sku->images as $image)
                    <img src="{{asset('storage/'.$image->path)}}" width="100px" class="mr-2">
                @endforeach
            @endforeach
        </div>
       </li>
        <li class="list-group-item">{{__('admin.Subcategory')}}: {{$product->subcategory->name}}</li>
      </ul>
    </div>
  </div>
  <div class="text-center mt-2">
     <a href="{{route('products.index')}}" class="btn btn-success">{{__('admin.Back to List')}}</a>
  </div>






@endsection
