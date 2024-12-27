@extends('app.master')
@section('pageTitle', 'Task')
@section('pageSubTitle', 'Task List')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Task Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Name -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <small class="d-block text-danger">
                                                {{ $errors->first('name') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Task -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input type="text" class="form-control" id="task" name="task" value="{{ old('task') }}">
                                        @if($errors->has('task'))
                                            <small class="d-block text-danger">
                                                {{ $errors->first('task') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Assign Date -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="assign_date">Assign Date</label>
                                        <input type="date" class="form-control" id="assign_date" name="assign_date" value="{{ old('assign_date') }}">
                                        @if($errors->has('assign_date'))
                                            <small class="d-block text-danger">
                                                {{ $errors->first('assign_date') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Finish Date -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="finish_date">Finish Date</label>
                                        <input type="date" class="form-control" id="finish_date" name="finish_date" value="{{ old('finish_date') }}">
                                        @if($errors->has('finish_date'))
                                            <small class="d-block text-danger">
                                                {{ $errors->first('finish_date') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <small class="d-block text-danger">
                                                {{ $errors->first('status') }}
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
        </div>
    </div>
</section>
@endsection
