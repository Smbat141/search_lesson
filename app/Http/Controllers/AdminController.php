<?php

namespace App\Http\Controllers;

use App\People;
use Response;
use Illuminate\Http\Request;

class AdminController extends Controller{

    public function show($id){
        $people = People::find($id);
        return view('index_site.admin_edit_page',['people'=>$people]);
    }

    public function store(Request $request){

        $input = $request->except('_token');
        $people = People::find($input['id']);

        if($request->hasFile('resume')){
            $file = $request->file('resume');
            $file->store('uploads','public');
            $input['resume'] = $file->hashName();
        }

        $people->fill($input);
        if($people->update()){
            return redirect('admin')->with('message','Data Update');
        }
    }

    public function delete(Request $request){
        $input = $request->except('_token');
        $people = People::find($input['id']);
        $people->delete();

        return redirect()->route('adminPage')->with('message','Data Deleted');
    }

    public function download($id){
        $people = People::find($id);
        $file= storage_path()."\app\public\\files\\".$people->resume;
        return Response::download($file,$people->resume);
    }
}
