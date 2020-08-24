@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Subject</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success')}}
                        </div>
                    @endif
                    <form action="/subject" method="POST" autocomplete="off">
                        {{csrf_field()}}
                        <div class="container noprint">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Save Subject</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Subject</div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($record as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{{strtoupper($record->subjects)}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable( {

        } );
    } );
</script>
@stop
@endsection