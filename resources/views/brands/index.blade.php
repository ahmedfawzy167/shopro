@extends('layouts.master')

@section('page-title')
 {{__('admin.All Brands')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.All Brands')}}</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{trans('admin.Name')}}</th>
                            <th>{{trans('admin.Image')}}</th>
                            <th>{{trans('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img src="{{asset('storage/'.$brand->image)}}" width="100px"></td>
                            <td>
                                <a href="{{ route('brands.show',$brand->id) }}" class="btn btn-info"><i class="ion-eye"></i></a>
                                <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-success"><i class="ion-ios-compose"></i></a>
                                <form action="{{route('brands.destroy' ,$brand->id)}}" method="post" style="display: inline-block">
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
                          <li class="page-item {{ $brands->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $brands->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($brands->getUrlRange(1, $brands->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $brands->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $brands->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $brands->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection

