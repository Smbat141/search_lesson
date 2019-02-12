<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\People;
use App\User;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index(){
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        //dd($user);
        return view('welcome',$data);
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
        //dd($input);

        $data = DB::table('peoples')
            ->where('first_name','like','%'.$input['first_name'].'%')
            ->where('last_name','like','%'.$input['last_name'].'%')
            ->where('keywords','like','%'.$input['keyword'].'%')
            ->where('resume','like','%'.$input['file_name'].'%')
            ->get();
        $arr = [
          'datas' => $data
        ];
        return view('index_site.admin',$arr);
    }


    public function store(SendRequest $request)
    {
        $input = $request->except('_token');
       // dd($input);

        if($request->hasFile('resume')) {
            $file = $request->file('resume');
            $file->store('files','public');
            $input['resume'] = $file->hashName();
            //dd($input);

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
