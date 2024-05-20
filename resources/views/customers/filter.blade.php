@extends('layouts.master')

@section('page-title')
 {{__('admin.All Customers')}}
@endsection

@section('page-content')
    <div class="row">

        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.All Customers in Cairo')}}</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{trans('admin.Name')}}</th>
                            <th>{{trans('admin.Phone')}}</th>
                            <th>{{trans('admin.Address')}}</th>
                            <th>{{trans('admin.City')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->city->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $customers->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $customers->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $customers->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $customers->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $customers->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>


@endsection

