@extends('layouts.master')

@section('page-title')
  {{__('admin.All Trashed Products')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body text-center">
            <div class="table-responsive">
                <h1 class="text-center bg-danger text-light"><i class="fas fa-trash"></i> {{__('admin.Trashed Products')}}</h1>
                 @if($trashedProducts->isEmpty())
                 <div class="d-flex justify-content-center">
                  <img src="{{asset('assets/img/trash.jpg')}}" width="500">
                  </div>
                  <h3 class="text-center mt-2">{{ __('admin.No Trashed Products Found!') }}</h3>

                @else
                 <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Cost')}}</th>
                            <th>{{__('admin.Price')}}</th>
                            <th>{{__('admin.Stock')}}</th>
                            <th>{{__('admin.Category')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach($trashedProducts as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{$product->cost}}</td>
                            <td>${{$product->price}}</td>
                            <td>{{$product->stock}}Q</td>
                            <td>{{$product->subcategory->name}}</td>
                            <td>
                                <form action="{{ route('products.restore',$product->id) }}" method="post" style="display: inline-block">
                                   @csrf
                                   @method('PUT')
                                   <button type="submit" class="btn btn-outline-success" style="display: inline-block"><i class="ion-loop"></i> {{__('admin.Restore')}}</button>
                                </form>
                                 <button type="submit" class="btn btn-outline-danger" data-toggle="modal" data-target="#productModal"><i class="ion-backspace"></i> {{__('admin.Delete')}}</button>
                            </td>
                        </tr>

    <!-- Modal -->
     <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="productModalLabel">{{__('admin.Delete Product')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{__('admin.Are you Sure you Want to Delete the Product?')}}
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <form action="{{ route('products.delete',$product->id) }}" method="POST" class="d-none">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-lg">{{__('admin.Yes')}}</button>
                </form>
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">{{__('admin.No')}}</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      </tbody>
      </table>
      @endif
        </div>
        </div>
    </div>


@endsection

