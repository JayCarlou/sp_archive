<?php

namespace App\Http\Controllers;
use App\DocumentType;
use App\Subject;
use App\Document;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
   //
   public function search(Request $req)
   {
      if($req->search==""){
         return \redirect('/');
      }
      else{
         $search = "%".$req->search."%";
         $keyword = ucwords($req->search);
      
         $results = Document::leftJoin('subject','subject.id','=','document.subject_id')
                  ->leftJoin('document_type','document_type.id','=','document.document_type_id')
                  ->orWhere('document.title','like',$search)
                  ->orWhere('subject.subjects','like',$search)
                  ->where(function ($query) {
                        $query->where('document.state', '=', '1');
                  })
                  ->orderBy('document.document_year','DESC')
                  ->orderBy('document.document_no','DESC')
                  ->paginate(5);
                  // ->get();

         $results->withPath('search?search='.$keyword);

         $counter = Document::leftJoin('subject','subject.id','=','document.subject_id')
                  ->leftJoin('document_type','document_type.id','=','document.document_type_id')
                  ->orWhere('document.title','like',$search)
                  ->orWhere('subject.subjects','like',$search)
                  ->where(function ($query) {
                     $query->where('document.state', '=', '1');
                  })
                  ->count();
         
         return view('search',['results'=>$results, 'counter'=>$counter, 'keyword'=>$keyword]);
      }
      
   }


   public function index(){
      return view('welcome');
   }
   
   public function getKeyword(Request $request){
      $search = $request->search;
      if($search == ''){
         $subjects = Subject::orderby('subjects','asc')->select('subjects')->limit(5)->get();
      }else{
         $subjects = Subject::orderby('subjects','asc')->select('subjects')->where('subjects', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($subjects as $subjects){
         $response[] = array("value"=>ucfirst(strtolower($subjects->subjects)));
      }

      return response()->json($response);
   }
}
