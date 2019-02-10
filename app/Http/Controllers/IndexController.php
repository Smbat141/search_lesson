<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index(){
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function execute(){
        $data = DB::table('peoples')->get();

        $arr = [
            'datas' => $data
        ];
        return view('index_site.admin',$arr);
    }

    public function search(Request $request){

        $input = $request->except('_token');

        $data = DB::table('peoples')->where('first_name','like','%'.$input['first_name'].'%')->get();

        $arr = [
          'datas' => $data
        ];
        return view('index_site.admin',$arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendRequest $request)
    {
        $input = $request->except('_token');


        if($request->hasFile('keywords')) {
            $file = $request->file('keywords');
            $input['keywords'] = $file->getClientOriginalName();
            $file->move(public_path('files/'),$input['keywords']);
           // dd($input);
        }

        $people = new People();
        $people->fill($input);

        if($people->save()){
            return redirect()->back()->with('message','Your data has been sent');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
