<?php

namespace App\Http\Controllers\easy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dorm;

class dormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Dorm::all();
        $data['obj'] = $obj;
        return view('easy.your_apartment',$data); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] ="post";
       $data['url'] = url('easyDorm');
        return view('easy.add_apartment',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Dorm();
        $obj->dorm_name = $request['nameBuilding'];
        $obj->dorm_address = $request['address'];
        $obj->dorm_numberWash =$request['num'];
        $obj->dorm_owner = $request['nameOwner'];
        $obj->dorm_phone = $request['phoneOwner'];
        $obj->user_id = 1;
        $obj->save();
        return redirect(url('easyDorm'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Dorm::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $obj = Dorm::find($id);
         $data['url'] =url('easyDorm/'.$id);
         $data['method'] = "put";
         $data['obj'] = $obj;
         return view('easy.add_apartment',$data);
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
        $obj = Dorm::find($id);
        $obj->dorm_name = $request['nameBuilding'];
        $obj->dorm_address = $request['address'];
        $obj->dorm_numberWash =$request['num'];
        $obj->dorm_owner = $request['nameOwner'];
        $obj->dorm_phone = $request['phoneOwner'];
        $obj->user_id = 1;
        $obj->save();
        return redirect(url('easyDorm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $obj = Dorm::find($id);
        $obj->delete();
        return redirect(url('easyDorm'));
    }
}
