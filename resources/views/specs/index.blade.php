@extends('layouts.master')

@section('page-title')
  {{__('admin.All Specs')}}
@endsection

@section('page-content')

    <div class="row">
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <h1 class="text-center bg-primary text-white"><i class="fa-solid fa-list"></i> {{__('admin.Specs List')}}</h1>
            <div class="table-responsive">
                <table class="table table-dark table-bordered mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Spec Category')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($specs as $spec)
                        <tr>
                            <td>{{$spec->id}}</td>
                            <td>{{$spec->name}}</td>
                            <td>{{$spec->specCategory->name}}</td>
                            <td>
                                <a href="{{ route('specs.show',$spec->id) }}" class="btn btn-info">{{__('admin.View')}}</a>
                                <a href="{{ route('specs.edit',$spec->id) }}" class="btn btn-success">{{__('admin.Edit')}}</a>
                                <form action="{{route('specs.destroy' ,$spec->id)}}" method="post" style="display: inline-block">
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
