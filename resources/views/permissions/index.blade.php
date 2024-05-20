@extends('layouts.master')

@section('page-title')
  {{__('admin.All Permissions')}}
@endsection

@section('page-content')
<style>
    .table-responsive {
        overflow-x: hidden;
    }
    .pagination {
        flex-wrap: wrap;
    }
</style>

    <div class="row">
        <div class="card-body">
         <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Permissions List')}}</h1>
         <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Permission Name')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href="{{ route('permissions.show',$permission->id) }}" class="btn btn-info"><i class="ion-eye"></i></a>
                                <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-success"><i class="ion-ios-compose"></i></a>
                                <form action="{{route('permissions.destroy' ,$permission->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-danger" style="display: inline-block"><i class="ion-trash-a"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item {{ $products->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                      </li>
                      @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}" aria-current="page">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                      @endforeach
                      <li class="page-item {{ $products->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                      </li>
                    </ul>
                  </nav>
                </div> --}}
            </div>
        </div>
    </div>

@include('layouts.messages')
@endsection
