@extends('app.master')
@section('pageTitle','Payment')
@section('pageSubTitle','Payment List')


@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('payment.create')}}" class="btn btn-primary">Add New</a>
                        </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>amount</th>
                                    <th>Pay Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $i=>$d)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$d->customer?->name}}</td>
                                        <td>{{$d->amount}}</td>
                                        <td>{{$d->pay_date}}</td>
                                        <td>
                                            <a href="{{route('payment.edit',encryptor('encrypt',$d->id))}}" class="btn btn-info">Edit</a>
                                            <button onclick="$('#c{{$d->id}}').submit()" class="btn btn-danger">Delete</button>

                                            <form id="c{{$d->id}}" method="post" action="{{route('payment.destroy',$d->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div>
</section>
  @endsection
