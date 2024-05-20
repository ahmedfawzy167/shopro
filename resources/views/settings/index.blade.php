@extends('layouts.master')

@section('page-title')
  {{__('admin.Settings')}}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">

            <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-gear"></i> {{__('admin.Configuration Settings')}}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.ID')}}</th>
                            <th>{{__('admin.Logo')}}</th>
                            <th>{{__('admin.Location')}}</th>
                            <th>{{__('admin.Email')}}</th>
                            <th>{{__('admin.Phone')}}</th>
                            <th>{{__('admin.lat')}}</th>
                            <th>{{__('admin.long')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($settings as $setting)
                        <tr>
                            <td>{{$setting->id}}</td>
                            <td><img src="{{asset('storage/'.$setting->logo)}}" class="rounded-circle" width="60px"></td>
                            <td>{{$setting->location}}</td>
                            <td>{{$setting->email}}</td>
                            <td>{{$setting->phone}}</td>
                            <td>{{$setting->lat}}</td>
                            <td>{{$setting->long}}</td>
                            <td>
                                <a href="{{ route('settings.create') }}" class="btn btn-primary">{{__('admin.Add')}}</a>
                                <a href="{{ route('settings.edit',$setting->id) }}" class="btn btn-success">{{__('admin.Edit')}}</a>
                                <form action="{{route('settings.destroy' ,$setting->id)}}" method="post" style="display: inline-block">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(session('message'))
     <script>
        Swal.fire({
        title: "Message",
        text: "{{ session('message') }}",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
        timer: 3000,
      });
    </script>
    @endif
@endsection
