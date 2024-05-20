@extends('layouts.master')

@section('page-title')
    {{ __('admin.All Reviews') }}
@endsection

@section('page-content')
    <div class="row">
        <div class="card-body">

            <div class="table-responsive">
                <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{ __('admin.All Reviews') }}
                </h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('admin.ID') }}</th>
                            <th>{{ trans('admin.Username') }}</th>
                            <th>{{ trans('admin.Product') }}</th>
                            <th>{{ trans('admin.Content') }}</th>
                            <th>{{ trans('admin.Rating') }}</th>
                            <th>{{ trans('admin.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->product->name }}</td>
                                <td>{{ $review->content }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>
                                    <a href="{{ route('reviews.show', $review->id) }}"
                                        class="btn btn-outline-success">{{ __('admin.Show') }}</a>
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-outline-danger">{{ __('admin.Delete') }}</button>
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

    @if (session('message'))
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
