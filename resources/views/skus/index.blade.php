@extends('layouts.master')

@section('page-title')
  {{__('admin.All Skus')}}
@endsection

@section('page-content')

    <div class="row">
        <div class="card-body">
            <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-list"></i> {{__('admin.Skus List')}}</h1>
            <form action="{{ route('skus.index') }}" method="get" class="row mb-4">
                @csrf
                 <div class="col-10">
                    <input type="text" value="{{ request('term') != "" ? request('term') : '' }}" name="term" id="term" class="form-control" placeholder="Search">
                 </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">{{__('admin.Search')}}</button>
                     <a href="{{route('skus.index')}}" class="btn btn-secondary">{{__('admin.Reset')}}</a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-dark table-bordered mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Product Name')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skus as $sku)
                        <tr>
                            <td>{{$sku->id}}</td>
                            <td>{{$sku->name}}</td>
                            <td>{{$sku->product->name}}</td>
                            <td>
                                <a href="{{ route('skus.show',$sku->id) }}" class="btn btn-info">{{__('admin.View')}}</a>
                                <a href="{{ route('skus.edit',$sku->id) }}" class="btn btn-success">{{__('admin.Edit')}}</a>
                                <form action="{{route('skus.destroy' ,$sku->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block">{{__('admin.Trash')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $skus->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $skus->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($skus->getUrlRange(1, $skus->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $skus->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $skus->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $skus->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection
