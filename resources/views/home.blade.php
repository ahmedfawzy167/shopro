@extends('layouts.master')

@section('page-title')
 {{__('admin.Home Page')}}
@endsection

@section('page-content')
@if(session('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
@endif

<body id="page-top">

     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{__('admin.Dashboard')}}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  {{__('admin.Customers In Cairo')}}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customers}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2xl text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    {{__('admin.Sales')}}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalRevenue}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{__('admin.Total Orders')}}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$orders}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    {{__('admin.Pending Requests')}}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                {{__('admin.Categories')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
         </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                {{__('admin.Subcategories')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$subcategories}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
         </div>


        </div>







    </div>













        <!-- Content Row -->
        <div class="row">

        <div class="col-xl-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa-regular fa-calendar-days"></i> {{__('admin.Products Today')}}</h3>
                </div>

         <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>{{__('admin.Name')}}</th>
                    <th>{{__('admin.Cost')}}</th>
                    <th>{{__('admin.Price')}}</th>
                    <th>{{__('admin.Stock')}}</th>
                    <th>{{__('admin.Category')}}</th>
                    <th>{{__('admin.Image')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productsToday as $product)
                @foreach($product->skus as $sku)
                <tr>
                    <td>{{$sku->name}}</td>
                    <td>${{$product->cost}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->stock}}Q</td>
                    <td>{{$product->subCategory->name}}</td>
                    <td><img src="{{asset('storage/'.$sku->image)}}" width="70px" class="mr-2"></td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>


     </div>
    </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection































































































































