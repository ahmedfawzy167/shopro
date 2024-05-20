@extends('layouts.master')

@section('page-title')
  {{__('admin.All Trashed Brands')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
          <div class="table-responsive">
             <h1 class="text-center bg-danger text-light"><i class="fas fa-trash"></i> {{__('admin.Trashed Brands')}}</h1>
              @if($trashedBrands->isEmpty())
              <div class="d-flex justify-content-center">
                <img src="{{asset('assets/img/trash.jpg')}}" width="500">
              </div>
              <h3 class="text-center mt-2">{{ __('admin.No Trashed Brands Found!') }}</h3>
               @else
                <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                      <th>{{__('admin.ID')}}</th>
                      <th>{{__('admin.Name')}}</th>
                      <th>{{__('admin.Image')}}</th>
                      <th>{{__('admin.Actions')}}</th>
                    </tr>
                </thead>
                    <tbody>
                      @foreach($trashedBrands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img src="{{asset('storage/'.$brand->image)}}" width="100px"></td>
                            <td>
                                <form action="{{ route('brands.restore', $brand->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                      <button type="submit" class="btn btn-outline-success" style="display: inline-block">{{__('admin.Restore')}}</button>
                                </form>
                                <form action="{{ route('brands.delete', $brand->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">{{__('admin.Delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection

