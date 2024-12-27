@extends('app.master')
@section('pageTitle', 'Task')
@section('pageSubTitle', 'Task List')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="{{ route('task.create') }}" class="btn btn-primary">Add New</a>
                        </h3>
                        <div class="card-tools">
                            <form method="GET" action="{{ route('task.index') }}">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search by Name or Task" value="{{ request('search') }}">
                                    
                                    <select name="status" class="form-control float-right mx-2">
                                        <option value="">All Statuses</option>
                                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Task</th>
                                    <th>Assign Date</th>
                                    <th>Finish Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $i => $d)
                                    <tr>
                                        <td>{{ $data->firstItem() + $i }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->task }}</td>
                                        <td>{{ $d->assign_date }}</td>
                                        <td>{{ $d->finish_date }}</td>
                                        <td>
                                            <span class="badge 
                                                {{ $d->status == 'Pending' ? 'badge-warning' : ($d->status == 'In Progress' ? 'badge-info' : 'badge-success') }}">
                                                {{ $d->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('task.edit', $d->id) }}" class="btn btn-info">Edit</a>
                                            <button onclick="$('#delete-form-{{ $d->id }}').submit()" class="btn btn-danger">Delete</button>

                                            <form id="delete-form-{{ $d->id }}" method="post" action="{{ route('task.destroy', $d->id) }}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No tasks found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center mt-3">
                            {{ $data->links() }}
                        </div>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div>
</section>
@endsection
