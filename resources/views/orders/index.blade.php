@extends('layouts.master')

@section('page-title')
 {{__('admin.All Orders')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
           <div class="table-responsive">
             <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Orders List')}}</h1>
             <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                      <th>{{__('admin.ID')}}</th>
                      <th>{{trans('admin.Name')}}</th>
                      <th>{{trans('admin.Product Name')}}</th>
                      <th>{{trans('admin.Type')}}</th>
                      <th>{{trans('admin.Date')}}</th>
                      <th>{{trans('admin.Total')}}</th>
                      <th>{{trans('admin.Actions')}}</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->sku->name}}</td>
                            <td>{{$order->user->type->name}}</td>
                            <td>{{$order->date}}</td>
                            <td>${{$order->total}}</td>
                            <td>
                              <form action="{{route('orders.reject' ,$order->id)}}" method="post" style="display: inline-block">
                                 @csrf
                                 @method('delete')
                                   <button type="submit" class="btn btn-danger" style="display: inline-block">{{__('admin.Reject')}}</button>
                               </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection

