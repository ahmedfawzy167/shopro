@extends('layouts.master')

@section('page-title')
    {{ __('admin.Edit Subcategory') }}
@endsection

@section('page-content')
    <div class="card">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container card-body">
            <h1 class="text-center bg-success text-white"><i class="fa-solid fa-pen-to-square"></i>
                {{ __('admin.Edit Subcategory') }}</h1>
            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post" class="row"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group col-md-12">
                    <label for="name">{{ __('admin.Subcategory Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ $subcategory->name }}"
                        class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="image">{{ __('admin.Subcategory Image') }}</label>
                    <img src="{{ asset('storage/' . $subcategory->image) }}" class="rounded-circle" width="80px">
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror mt-2">
                    @error('image')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label for="category_id">{{ __('admin.Category') }}</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('admin.Update') }}</button>
                    <button type="reset" class="btn btn-secondary btn-lg">{{ __('admin.Reset') }}</button>
                </div>

            </form>
        </div>
    </div>
@endsection
