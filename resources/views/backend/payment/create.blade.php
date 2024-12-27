@extends('app.master')
@section('pageTitle','Payment')
@section('pageSubTitle','Payment List')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Payment Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('payment.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Customer</label>
                                <select class="form-control" name="customer_id" id="customer_id">
                                    @forelse ($customer as $c)
                                        <option value="{{$c->id}}" >{{$c->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="text">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                @if($errors->has('amount'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('amount')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="pay_date">Pay Date</label>
                                <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{old('pay_date')}}">
                                @if($errors->has('pay_date'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('pay_date')}}
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
