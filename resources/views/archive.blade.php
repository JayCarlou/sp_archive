@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Archive</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success')}}
                        </div>
                    @endif
                    <table id="table" class="table table-striped table-bordered" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th style="width:100px">Document No.</th>
                                <th style="width:100px">Type</th>
                                <th>Subject</th>
                                <th>Title</th>
                                <th style="width:80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $documents)
                                <tr>
                                    <td>{{$documents->document_year}}</td>
                                    <td>{{$documents->document_no}}</td>
                                    <td>{{$documents->document_type}}</td>
                                    <td>{{$documents->subjects}}</td>
                                    <td>{{$documents->title}}</td>
                                    <td>
                                        <a href="document_edit/{{$documents->id}}" target="_blank" title="Update Document">
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                        </a>
                                        @if($documents->state=="1")
                                            <a href="document_disable/{{$documents->id}}" title="Disable Document">
                                                <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-times"></i></button>
                                            </a>
                                        @else
                                            <a href="document_enable/{{$documents->id}}" title="Enable Document">
                                                <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                                            </a>
                                        @endif
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

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable( {
            "order": [[ 0, "desc" ]]
        } );
    } );
</script> 
@stop
@endsection