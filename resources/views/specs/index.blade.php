@extends('layouts.master')

@section('page-title')
  {{__('admin.All Specs')}}
@endsection

@section('page-content')

    <div class="row">
        <div class="card-body">
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
                                <a href="{{ route('specs.show',$spec->id) }}" class="btn btn-info">{{__('admin.Show')}}</a>
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
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $specs->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $specs->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($specs->getUrlRange(1, $specs->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $specs->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $specs->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $specs->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>

        </div>
    </div>

@include('layouts.messages')
@endsection
