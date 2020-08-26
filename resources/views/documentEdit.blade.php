@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Document</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success')}}
                        </div>
                    @endif
                    <form action="/document_edit" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="docId" id="docId" value="{{$documentId}}">
                        <div class="container">
                            <div class="form-group">
                                <label for="documentYear">Document Year *</label>
                                <input type="number" class="form-control" name="documentYear" id="documentYear" value="{{$documentYear}}" required/>
                            </div>
                            <div class="form-group">
                                <label for="documentNo">Document No. *</label>
                                <input type="text" class="form-control" name="documentNo" id="documentNo" value="{{$documentNo}}" required/>
                            </div>
                            <div class="form-group">
                                <label for="documentType">Document Type *</label>
                                <select class="form-control" name="documentType" id="documentType" required/>
                                    <option value="{{$cDocTypeId}}">{{strtoupper($cDocType)}}</option>
                                    @foreach($documentType as $documentType)
                                        <option value="{{$documentType->id}}">{{strtoupper($documentType->document_type)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <select class="form-control" name="subject" id="subject" required/>
                                    <option value="{{$cSubId}}">{{$cSub}}</option>
                                    @foreach($subjects as $subjects)
                                        <option value="{{$subjects->id}}">{{strtoupper($subjects->subjects)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <textarea class="form-control" name="title" id="title" rows="5" required>{{$title}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Update Uploaded File</div>
                <div class="card-body">
                    @if(Session::has('flash_message_success_upload'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fas fa-times"></i></a>
                            {{Session::get('flash_message_success_upload')}}
                        </div>
                    @endif  
                    <form action="/document_edit_upload" method="POST" enctype="multipart/form-data" onsubmit="return Validate(this);">
                        {{csrf_field()}}
                        <input type="hidden" name="docId" id="docId" value="{{$documentId}}">
                        <div class="form-group">
                            <label for="uploadFile">Upload File</label>
                            <input type="file" class="form-control" name="uploadFile" id="uploadFile" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Upload Updated File</button>
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

    
    var _validFileExtensions = [".pdf"];
    function Validate(oForm) {
        var arrInputs = oForm.getElementsByTagName("input");
        for (var i = 0; i < arrInputs.length; i++) {
            var oInput = arrInputs[i];
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }   

                    if (!blnValid) {
                        alert("Sorry, allowed extension is: " + _validFileExtensions.join(", "));
                        return false;
                    }
                }
            }
        }
        return true;
    }
   
</script>
@stop
@endsection