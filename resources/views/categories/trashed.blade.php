@extends('layouts.master')

@section('page-title')
  {{__('admin.All Trashed Categories')}}
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
                <h1 class="text-center bg-primary text-light"><i class="fas fa-trash"></i> {{__('admin.Trashed Categories')}}</h1>

                @if($trashedCategories->isEmpty())
                <div class="d-flex justify-content-center">
                  <img src="{{asset('assets/img/trash.jpg')}}" width="500">
                </div>
                  <h3 class="text-center mt-2">{{ __('admin.No Trashed Categories Found!') }}</h3>

               @else
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($trashedCategories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <form action="{{ route('categories.restore', $category->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                      <button type="submit" class="btn btn-outline-success" style="display: inline-block">{{__('admin.Restore')}}</button>
                                </form>
                                <form action="{{ route('categories.delete', $category->id) }}" method="POST" style="display: inline">
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

