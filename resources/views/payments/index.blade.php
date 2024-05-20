@extends('layouts.master')

@section('page-title')
 {{__('admin.All Payments')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">

            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.All Payments')}}</h1>
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{trans('admin.Username')}}</th>
                            <th>{{trans('admin.Amount')}}</th>
                            <th>{{trans('admin.Date')}}</th>
                            <th>{{trans('admin.Method')}}</th>
                            <th>{{trans('admin.Status')}}</th>
                            <th>{{trans('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->user->name}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->method}}</td>
                            <td>{{$payment->status}}</td>
                            <td>
                                <form action="{{ route('payments.accept', $payment->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">{{__('admin.Accept')}}</button>
                                </form>
                                <form action="{{ route('payments.reject', $payment->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">{{__('admin.Reject')}}</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('message'))
     <script>
        Swal.fire({
        title: "Message",
        text: "{{ session('message') }}",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
        timer: 3000,
      });
    </script>
    @endif
@endsection

