@extends('layouts.master')

@section('page-title')
 {{__('admin.All Categories')}}
@endsection


@section('page-content')
    <div class="row">
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Categories List')}}</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{trans('admin.Name')}}</th>
                            <th>{{trans('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{ route('categories.show',$category->id) }}" class="btn btn-secondary">{{trans('admin.View')}}</a>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-success">{{trans('admin.Edit')}}</a>
                                <form action="{{route('categories.destroy' ,$category->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block">{{trans('admin.Trash')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

