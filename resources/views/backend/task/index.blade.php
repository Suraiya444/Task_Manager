@extends('app.master')
@section('pageTitle','Task')
@section('pageSubTitle','Task List')


@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{route('task.create')}}" class="btn btn-primary">Add New</a>
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
                                    <th>Name</th>
                                    <th>Task</th>
                                    <th>Assign Date</th>
                                    <th>Finish Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $i=>$d)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->task}}</td>
                                        <td>{{$d->assign_date}}</td>
                                        <td>{{$d->finish_date}}</td>
                                        <td>
                                            <a href="{{route('task.edit',($d->id))}}" class="btn btn-info">Edit</a>
                                            <button onclick="$('#c{{$d->id}}').submit()" class="btn btn-danger">Delete</button>

                                            <form id="c{{$d->id}}" method="post" action="{{route('task.destroy',$d->id)}}">
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
