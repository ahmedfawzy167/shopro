@extends('layouts.master')

@section('page-title')
  {{__('admin.All Subcategories')}}
@endsection

@section('page-content')

<style>
    .table-responsive{
        overflow-x: hidden;
    }
</style>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Subcategories List')}}</h1>
                <form action="{{ route('subcategories.index') }}" method="get" class="row mb-4">
                    @csrf
                    <div class="col-10">
                        <input type="text" value="{{ request('term') != "" ? request('term') : '' }}" name="term" id="term" class="form-control" placeholder="Search For Subcategory Name">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">{{__('admin.Search')}}</button>
                         <a href="{{route('subcategories.index')}}" class="btn btn-secondary">{{__('admin.Reset')}}</a>
                    </div>
                </form>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Image')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td><img src="{{asset('storage/'.$subcategory->image)}}" width="130px"></td>
                            <td>
                              <a href="{{ route('subcategories.show',$subcategory->id) }}" class="btn btn-outline-info">{{__('admin.Show')}}</a>
                              <a href="{{ route('subcategories.edit',$subcategory->id) }}" class="btn btn-outline-success">{{__('admin.Edit')}}</a>
                              <form action="{{route('subcategories.destroy' ,$subcategory->id)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger" style="display: inline-block">{{__('admin.Trash')}}</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $subcategories->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $subcategories->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($subcategories->getUrlRange(1, $subcategories->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $subcategories->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $subcategories->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $subcategories->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection

