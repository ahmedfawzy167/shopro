@extends('layouts.master')

@section('page-title')
  {{__('admin.All Categories')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Categories List')}}</h1>
                <table class="table table-bordered table-hover">
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
                              <div class="btn-group manage-button">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                 <a href="{{ route('categories.show',$category->id) }}" class="dropdown-item"> <i class="fas fa-eye"></i> {{trans('admin.Show')}}</a>
                                 <a href="{{ route('categories.edit',$category->id) }}" class="dropdown-item disabled-link"><i class="fas fa-edit"></i> {{trans('admin.Edit')}}</a>
                                 <form action="{{route('categories.destroy' ,$category->id)}}" method="post" style="display: inline-block">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="dropdown-item delete-button" style="display: inline-block"><i class="fas fa-trash"></i> {{trans('admin.Trash')}}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $categories->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $categories->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $categories->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $categories->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>
        </div>
    </div>

@include('layouts.messages')

@endsection

