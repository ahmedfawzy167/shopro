@extends('layouts.master')

@section('page-title')
  {{__('admin.All Users')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
         <div class="table-responsive">
            <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Pending Accounts')}}</h1>
            <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Email')}}</th>
                            <th>{{__('admin.Type')}}</th>
                            <th>{{__('admin.status')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingUsers as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type->name}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                <form action="{{ route('users.accept', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                                <form action="{{ route('users.reject', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{ $pendingUsers->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $pendingUsers->previousPageUrl() }}">{{__('pagination.Previous')}}</a>
                          </li>
                          @foreach ($pendingUsers->getUrlRange(1, $pendingUsers->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $pendingUsers->currentPage() ? 'active' : '' }}" aria-current="page">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                          @endforeach
                          <li class="page-item {{ $pendingUsers->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $pendingUsers->nextPageUrl() }}">{{__('pagination.Next')}}</a>
                          </li>
                        </ul>
                      </nav>
                    </div>
            </div>

        </div>
    </div>

@include('layouts.messages')
@endsection

