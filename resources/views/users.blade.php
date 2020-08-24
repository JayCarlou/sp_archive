@extends('adminlte::page')

@section('content')
<div id="app">
    <users :users="users" :action="action" :reset="reset"></users>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Management</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <button @click="usersClicked({},'add')" type="button" class="btn btn-success btn-sm float-left mb-2">Add User</i></button>
                        </div>
                        <br>
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $users)
                                <tr>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>
                                        <button @click="usersClicked({{json_encode($users ?? '')}},'edit')" type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button>
                                        <button @click="usersClicked({{json_encode($users ?? '')}},'delete')" type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/app.js"></script>

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@stop
@endsection