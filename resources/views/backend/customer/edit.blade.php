@extends('app.master')
@section('pageTitle','Customer')
@section('pageSubTitle','Customer List')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Customer Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('customer.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$customer->name)}}">
                                @if($errors->has('name'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$customer->email)}}">
                                @if($errors->has('email'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('email')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact',$customer->contact)}}">
                                @if($errors->has('contact'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('contact')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo')}}">
                                @if($errors->has('photo'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('photo')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
        </div><!--/.col (left) -->
    </div>
</section>
  @endsection
