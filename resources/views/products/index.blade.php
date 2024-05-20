@extends('layouts.master')

@section('page-title')
  {{__('admin.All Products')}}
@endsection

@section('page-content')
<style>
    .table-responsive {
        overflow-x: hidden;
    }
    .pagination {
        flex-wrap: wrap;
    }
</style>

    <div class="row">
        <div class="card-body">
         <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Products List')}}</h1>
         <div class="table-responsive">
                <form action="{{ route('products.index') }}" method="get" class="row mb-4">
                    @csrf
                    <div class="col-10">
                        <div class="input-group">
                            <input type="text" name="term" id="term" class="form-control" value="{{ request('term') != "" ? request('term') : '' }}" placeholder="{{__('admin.Search')}}...">
                            <label for="filter" class="ms-2 mt-2">{{__('admin.Filter By')}}:</label>
                            <select name="filter" id="filter" class="form-select ms-2">
                                <option value="name" {{ request('filter') === 'name' ? 'selected' : '' }}>{{__('admin.Name')}}</option>
                                <option value="cost" {{ request('filter') === 'cost' ? 'selected' : '' }}>{{__('admin.Cost')}}</option>
                                <option value="price" {{ request('filter') === 'price' ? 'selected' : '' }}>{{__('admin.Price')}}</option>
                                <option value="stock" {{ request('filter') === 'stock' ? 'selected' : '' }}>{{__('admin.Stock')}}</option>
                                <option value="sub_category_id" {{ request('filter') === 'sub_category_id' ? 'selected' : '' }}>{{__('admin.Subcategory')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">{{__('admin.Filter')}}</button>
                         <a href="{{route('products.index')}}" class="btn btn-secondary">{{__('admin.Reset')}}</a>
                    </div>
                </form>
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Cost')}}</th>
                            <th>{{__('admin.Price')}}</th>
                            <th>{{__('admin.Stock')}}</th>
                            <th>{{__('admin.Subcategory')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{$product->cost}}</td>
                            <td>${{$product->price}}</td>
                            <td>{{$product->stock}}Q</td>
                            <td>{{$product->subcategory->name}}</td>
                            <td>
                                <a href="{{ route('products.show',$product->id) }}" class="btn btn-info"><i class="ion-eye"></i></a>
                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success"><i class="ion-ios-compose"></i></a>
                                <form action="{{route('products.destroy' ,$product->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block"><i class="ion-trash-a"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item {{ $products->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                      </li>
                      @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}" aria-current="page">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                      @endforeach
                      <li class="page-item {{ $products->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection
