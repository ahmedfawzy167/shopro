@extends('layouts.master')

@section('page-title')
  {{__('admin.All Users')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Users Vendors')}}</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.User Name')}}</th>
                            <th>{{__('admin.Email')}}</th>
                            <th>{{__('admin.Type')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type->name}}</td>

                            <td>
                                <a href="{{ route('users.show',$user->id) }}" class="btn btn-secondary">{{__('admin.View')}}</a>
                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success">{{__('admin.Edit')}}</a>
                                <form action="{{route('users.destroy' ,$user->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block">{{__('admin.Delete')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
    </div>
@endsection

