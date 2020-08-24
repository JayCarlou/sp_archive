@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Document</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success')}}
                        </div>
                    @endif
                    <form action="/document" method="POST" autocomplete="off">
                        {{csrf_field()}}
                        <div class="container">
                            <div class="form-group">
                                <label for="documentYear">Document Year *</label>
                                <input type="number" class="form-control" name="documentYear" id="documentYear" required/>
                            </div>
                            <div class="form-group">
                                <label for="documentNo">Document No. *</label>
                                <input type="text" class="form-control" name="documentNo" id="documentNo" required/>
                            </div>
                            <div class="form-group">
                                <label for="documentType">Document Type *</label>
                                <input type="text" class="form-control" name="documentType" id="documentType" required/>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <input type="text" class="form-control" name="subject" id="subject" required/>
                            </div>
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" required/>
                            </div>
                            <div class="form-group">
                                <label for="uploadFile">Upload File</label>
                                <input type="file" class="form-control" name="uploadFile" id="uploadFile" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Save Document Type</button>
                            </div>
                        </div>
                    </form>
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