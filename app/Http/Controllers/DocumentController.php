<?php

namespace App\Http\Controllers;
use App\DocumentType;
use App\Subject;
use Illuminate\Http\Request;

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

    }

    public function documentSave(){
        
    }
}

