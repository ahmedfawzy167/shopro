@extends('layouts.master')

@section('page-title')
  {{__('admin.Edit Spec')}}
@endsection

@section('page-content')

<div class="card">
  @if($errors->any())
   <div class="alert alert-danger">
     <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
   </div>
@endif

<div class="container card-body">
  <h1 class="text-center bg-success text-white"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.Edit Spec')}}</h1>
  <form action="{{route('specs.update',$spec->id)}}" method="post" class="row" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group col-md-12">
      <label for="name">{{__('admin.Spec Name')}}</label>
      <input type="text" name="name" id="name"class="form-control @error('name') is-invalid @enderror" value="{{$spec->name}}">
      @error('name')
        <strong class="invalid-feedback">{{ $message }}</strong>
     @enderror
    </div>

    <div class="form-group col-md-12">
        <label for="spec_category_id">{{__('admin.Spec Category')}}</label>
        <select name="spec_category_id" id="spec_category_id" class="form-select">
          @foreach($specCategories as $specCategory)
            <option value="{{$specCategory->id}}" {{$specCategory->id == $spec->spec_category_id ? 'selected' : ''}}>{{$specCategory->name}}</option>
          @endforeach
        </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">{{__('admin.Update')}}</button>
            <button type="reset" class="btn btn-secondary btn-lg">{{__('admin.Reset')}}</button>
        </div>

</form>
</div>
</div>

@endsection
