@extends('app.master')
@section('pageTitle','Task')
@section('pageSubTitle','Task List')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Task
 Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('task.update',$task->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$task->name)}}">
                                @if($errors->has('name'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="task">Task</label>
                                <input type="text" class="form-control" id="task" name="task" value="{{old('task',$task->task)}}">
                                @if($errors->has('task'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('task')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="assign_date">Assign Date</label>
                                <input type="date" class="form-control" id="assign_date" name="assign_date" value="{{old('assign_date',$task->contact)}}">
                                @if($errors->has('assign_date'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('assign_date')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="assign_date">Finish Date</label>
                                <input type="date" class="form-control" id="assign_date" name="assign_date" value="{{old('assign_date')}}">
                                @if($errors->has('assign_date'))
                                    <small class="d-block text-danger">
                                        {{$errors->first('assign_date')}}
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
