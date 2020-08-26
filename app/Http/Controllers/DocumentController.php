<?php

namespace App\Http\Controllers;
use App\DocumentType;
use App\Subject;
use App\Document;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
{
    //
    public function add()
    {
        return view('add');
    }

    public function documentType(){
        $record = DocumentType::get();
        return view('documentType',['record'=>$record]);
    }

    public function documentTypeSave(Request $req){
        $record = new DocumentType();
        $record->document_type = $req->documentType;
        // $record->save();

        $req->session()->flash('flash_message_success', ' Document Type Saved.');
        return redirect('document_type');
    }

    public function subject(){
        $record = Subject::where('subjects','!=','')
                    ->get();
        return view('subject',['record'=>$record]);
    }

    public function subjectSave(Request $req){
        $record = new Subject();
        $record->subjects = $req->subject;
        // $record->save();

        $req->session()->flash('flash_message_success', ' Subject Saved.');
        return redirect('subject');
    }

    public function document(){
        $documentType = DocumentType::get();

        $subjects = Subject::where('subjects','!=','')
                    ->get();
                 
        return view('document',['documentType'=>$documentType, 'subjects'=>$subjects]);
    }

    public function documentSave(Request $req){
        $userId = Auth::user()->id;

        function randomString($length = 20)
        {
            $str = "";
            $characters = array_merge(range('A', 'Z'), range('1', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }
            return $str;
        }
        $dateCode = date('Ymd');
        $timeCode = date('HisA');

        $uploadFile = $req->file('uploadFile');
        $uploadFileExtension = $req->file('uploadFile')->extension();
        $pdfFile = $dateCode.randomString().$timeCode.'.'.$uploadFileExtension;
        $uploadFile->move(base_path('\public\upload'), $pdfFile);
    
        $record = new Document();
        $record->document_year = $req->documentYear;
        $record->document_no = $req->documentNo;
        $record->document_type_id = $req->documentType;
        $record->subject_id = $req->subject;
        $record->title = $req->title;
        $record->file = $pdfFile;
        $record->user_id = $userId;
        $record->state = "1";
        $record->save();

        $req->session()->flash('flash_message_success', ' Document Saved.');
        return redirect('document');
    }

    public function archive(){
        $documents = Document::leftJoin('document_type','document_type.id','=','document.document_type_id')
                    ->leftJoin('subject','subject.id','=','document.subject_id')
                    ->select('document.id','document.document_year','document.document_no','document_type.document_type','subject.subjects','document.title','document.state')
                    ->get();

        return view('archive',['documents'=>$documents]);
    }

    public function documentEdit($id){
        $record = Document::find($id);
        $documentId = $record->id;
        $documentYear = $record->document_year;
        $documentNo = $record->document_no;
        $documentTypeId = $record->document_type_id;
        $subjectId = $record->subject_id;
        $title = $record->title;

        $chosenDocumentType = DocumentType::where('id','=',$documentTypeId)
                                ->first();
        $cDocTypeId = $chosenDocumentType->id;
        $cDocType = $chosenDocumentType->document_type;

        
        $chosenSubject = Subject::where('id','=',$subjectId)
                            ->first();
        $cSubId = $chosenSubject->id;
        $cSub = $chosenSubject->subjects;

        $documentType = DocumentType::where('id','!=',$documentTypeId)
                            ->get();
        $subjects = Subject::where('id','!=',$subjectId)
                    ->get();
                 
        return view('documentEdit',['documentId'=>$documentId, 'documentYear'=>$documentYear, 'documentNo'=>$documentNo, 'title'=>$title, 'cDocTypeId'=>$cDocTypeId, 'cDocType'=>$cDocType, 'cSubId'=>$cSubId, 'cSub'=>$cSub, 'documentType'=>$documentType, 'subjects'=>$subjects]);
    }

    public function documentEditSave(Request $req){
        $documentId = $req->docId;
        $record = Document::find($documentId);
        $record->document_year = $req->documentYear;
        $record->document_no = $req->documentNo;
        $record->document_type_id = $req->documentType;
        $record->subject_id = $req->subject;
        $record->title = $req->title;
        $record->save();

        $req->session()->flash('flash_message_success', ' Saved Changes.');
        return redirect('document_edit/'.$documentId);
    }

    public function documentEditUpload(Request $req){
        $documentId = $req->docId;
        $record = Document::find($documentId);
        $file = $record->file;
        
        if(file_exists("../public/upload/".$file)){
            unlink("../public/upload/".$file);
        }else{
            //no action
        }

        function randomString($length = 20)
        {
            $str = "";
            $characters = array_merge(range('A', 'Z'), range('1', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }
            return $str;
        }
        $dateCode = date('Ymd');
        $timeCode = date('HisA');

        $uploadFile = $req->file('uploadFile');
        $uploadFileExtension = $req->file('uploadFile')->extension();
        $pdfFile = $dateCode.randomString().$timeCode.'.'.$uploadFileExtension;
        $uploadFile->move(base_path('\public\upload'), $pdfFile);

        $editRecord = Document::find($documentId);
        $editRecord->file = $pdfFile;
        $editRecord->save();

        $req->session()->flash('flash_message_success_upload', ' Uploaded file changed.');
        return redirect('document_edit/'.$documentId);

    }

    public function documentDisable(Request $req, $id){
        $editRecord = Document::find($id);
        $editRecord->state = '0';
        $editRecord->save();

        $req->session()->flash('flash_message_success', ' Document Disabled.');
        return redirect('archive');
    }

    public function documentEnable(Request $req, $id){
        $editRecord = Document::find($id);
        $editRecord->state = '1';
        $editRecord->save();

        $req->session()->flash('flash_message_success', ' Document Enabled.');
        return redirect('archive');
    }
}

