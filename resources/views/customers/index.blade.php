@extends('layouts.master')

@section('page-title')
{{__('admin.All Customers')}}
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('page-content')
    <div class="row">
        <div class="card-body">
          <h1 class="text-center bg-primary text-light"><i class="fa-solid fa-list"></i> {{__('admin.Customers List')}}</h1>
           <div class="col-sm-12">
             <button class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal">{{__('admin.Add New Customer')}}</button>
           </div>
            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>{{__('admin.Name')}}</th>
                            <th>{{__('admin.Phone')}}</th>
                            <th>{{__('admin.Address')}}</th>
                            <th>{{__('admin.City')}}</th>
                            <th>{{__('admin.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>
                                @if($customer->city->id == 4)
                                    @continue
                                @else
                                  {{$customer->city->name}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('customers.show',$customer->id) }}" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                <button class="btn btn-outline-success edit-button" data-toggle="modal" data-target="#editModal" data-id="{{$customer->id}}" id="edit-button-{{$customer->id}}"><i class="ion-ios-compose"></i></button>
                                <form action="{{route('customers.destroy' ,$customer->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-outline-danger" style="display: inline-block"><i class="ion-ios-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form id="addClient" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
              <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Add New Customer</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
               <div class="modal-body">
                @if($errors->any())
                <div class="alert alert-danger">
                 <ul>
                   @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
                </ul>
               </div>
               @endif
                  <ul id="error" class="list-unstyled"></ul>
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                     @error('phone')
                      <strong class="invalid-feedback">{{ $message }}</strong>
                     @enderror
                 </div>

                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
                      @error('address')
                        <strong class="invalid-feedback">{{ $message }}</strong>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="pdf">PDF</label>
                    <input type="file" name="pdf" id="pdf" class="form-control @error('pdf') is-invalid @enderror">
                    @error('pdf')
                      <strong class="invalid-feedback">{{ $message }}</strong>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="city_id">City</label>
                    <select name="city_id" id="city_id" class="form-control mt-2 mb-4">
                       @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                       @endforeach
                    </select>
                  </div>

              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg">Add</button>
                <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
              </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Edit Modal -->
<div class="modal fade edit-modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form id="editClient" action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
              <div class="modal-header">
                  <h3 class="modal-title" id="editModal">Edit Customer</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
               <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                 <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
                </ul>
               </div>
               @endif
                  <ul id="error" class="list-unstyled"></ul>
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" value="{{$customer->name}}" class="form-control mt-2 mb-4">
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{$customer->phone}}" class="form-control mt-2 mb-4">
                 </div>

                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" id="address" value="{{$customer->address}}" class="form-control mt-2 mb-4">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control mt-2 mb-4">
                </div>

                  <div class="form-group">
                    <label for="city_id">City</label>
                    <select name="city_id" id="city_id" class="form-control mt-2 mb-4">
                      <option value="{{$customer->city->id}}">{{$customer->city->name}}</option>
                    </select>
                  </div>

              </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
              </div>
        </form>
      </div>
    </div>
  </div>

 </div>
 </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$.ajaxSetup({
             headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
           });

  $('#addClient').submit(function(e) {
    e.preventDefault();
    var formData  = new FormData(jQuery('#addClient')[0]);
    $.ajax({
      url: "{{ route('customers.store') }}",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log(response);
      },
      });
      });
</script>



<script>
  $(document).on('click', '.edit-button', function() {
    var customerId = $(this).data('id');
    $.ajax({
        url: "{{ route('customers.edit', '') }}/" + customerId,
        type: "GET",
        data: {id: customerId},
        success: function(response) {
            $('#editModal').find('.modal-body').html(response);
        },
    });
});
</script>


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
