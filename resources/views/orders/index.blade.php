@extends('layouts.master')

@section('page-title')
 {{__('admin.All Orders')}}
@endsection


@section('page-content')
    <div class="row">
        <div class="card-body">

            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Orders List')}}</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{trans('admin.Name')}}</th>
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
                            <td>{{$order->user->type->name}}</td>
                            <td>{{$order->date}}</td>
                            <td>${{$order->total}}</td>
                            <td>
                                <a href="#" class="btn btn-success">Accept</a>
                                <a href="#" class="btn btn-danger">Reject</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

