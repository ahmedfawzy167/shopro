@extends('layouts.master')

@section('page-title')
    {{ __('admin.Show Review') }}
@endsection

@section('page-content')
    <div class="d-flex justify-content-center align-items-center vh-60">
        <div class="card" style="width: 60rem;">
            <div class="card-body">
                <h2 class="card-title text-center bg-success text-white"><i class="fa-solid fa-eye"></i>
                    {{ __('admin.Review Details') }}</h2>
            </div>
            <ul class="list-group list-group-flush">
                <h4 class="list-group-item">{{ __('admin.Username') }}: {{ $review->user->name }}</h4>
                <h4 class="list-group-item">{{ __('admin.Product Name') }}: {{ $review->product->name }}</h4>
                <h4 class="list-group-item">{{ __('admin.Price') }}: ${{ $review->product->price }}</h4>
                <h4 class="list-group-item">{{ __('admin.Sku Image') }}:
                    @foreach ($review->product->skus as $sku)
                        @foreach ($sku->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" width="100px" class="rounded-circle">
                        @endforeach
                    @endforeach
                </h4>
                <h4 class="list-group-item">{{ __('admin.Content') }}: {{ $review->content }}</h4>
                <h4 class="list-group-item">{{ __('admin.Rating') }}: {{ $review->rating }}</h4>
            </ul>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('reviews.index') }}" class="btn btn-success mt-2">{{ __('admin.Back to List') }}</a>
    </div>
@endsection
