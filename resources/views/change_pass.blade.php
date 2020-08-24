@extends('adminlte::page')

@section('content')
<div id="app">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Management</h3>
                    </div>

                    <div class="card-body">
                        @if(isset($error))
                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{$msg}}
                        </div>
                        @endif
                        @if(isset($success))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{$msg}}
                        </div>
                        @endif
                        <form action="/password/change" method="POST">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="old_passw">Old Password</label>
                                <input type="password" class="form-control" name="old_passw" id="old_passw" required autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="new_passw">New Password</label>
                                <input type="password" class="form-control" name="new_passw" id="new_passw" required autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="c_passw">Confirm New Password</label>
                                <input type="password" class="form-control" name="c_passw" id="c_passw" required autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/app.js"></script>
@stop