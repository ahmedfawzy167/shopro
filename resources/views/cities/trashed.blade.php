@extends('layouts.master')

@section('page-title')
  {{__('admin.All Trashed Cities')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <h1 class="text-center bg-danger text-light"><i class="fas fa-trash"></i> {{__('admin.Trashed Cities')}}</h1>
                @if($trashedCities->isEmpty())
                <div class="d-flex justify-content-center">
                 <img src="{{asset('assets/img/trash.jpg')}}" width="500">
                </div>
                <h3 class="text-center mt-2">{{ __('admin.No Trashed Cities Found!') }}</h3>
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
                      @foreach($trashedCities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                                <form action="{{ route('cities.restore', $city->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('PUT')
                                      <button type="submit" class="btn btn-outline-success" style="display: inline-block"><i class="ion-ios-refresh-empty"></i> {{__('admin.Restore')}}</button>
                                </form>
                                <form action="{{ route('cities.delete', $city->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"><i class="ion-ios-trash"></i> {{__('admin.Delete')}}</button>
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

