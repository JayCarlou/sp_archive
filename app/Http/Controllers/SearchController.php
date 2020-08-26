<?php

namespace App\Http\Controllers;
use App\DocumentType;
use App\Subject;
use App\Document;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $req)
    {
        $search = "%".$req->search."%";
        $results = Document::leftJoin('subject','subject.id','=','document.subject_id')
                    ->leftJoin('document_type','document_type.id','=','document.document_type_id')
                    ->where('document.title','like',$search)
                    ->whereOr('subject.subjects','like',$search)
                    ->orderBy('document.document_no','DESC')
                    ->get();

        return view('search',['results'=>$results]);
    }
}
