<?php

namespace App\Http\Controllers\easy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dorm;
use App\report;
use App\wash_firebase;
use Carbon\Carbon;

class detailController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $obj = Dorm::all();
        // $data['obj'] = $obj;
        // return view('easy.detail_apartment',$data); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //  $data['method'] ="post";
       // $data['url'] = url('easyDetail');
       //  return view('easy.add_apartment',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $obj = new Dorm();
        // $obj->dorm_name = $request['nameBuilding'];
        // $obj->dorm_address = $request['address'];
        // $obj->dorm_numberWash =$request['num'];
        // $obj->dorm_owner = $request['nameOwner'];
        // $obj->dorm_phone = $request['phoneOwner'];
        // $obj->user_id = 1;
        // $obj->save();
        // return redirect(url('easyDetail'));
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
        $data['obj'] = $obj;  
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $tmp=[];
        for ($i = 0; $i < $number_Wash; $i++) {
        $tmp[]= report::where('wash_id','=',($i+1))          
                 -> where('created_at', '=', Carbon::today())
                 ->count();
        }     
         $data['wash_id'] =$tmp;
         return view('easy.detail_apartment',$data);
    }


    public function statisUse($id)
    {
        $obj = Dorm::find($id);
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $tmp=[];
        for ($i = 0; $i < $number_Wash; $i++) {
       $tmp[]= report::where('wash_id','=',($i+1))          
                 -> where('created_at', '=', Carbon::today())
                 ->count();
        } 
         $data['wash_id'] =$tmp;
         return response()->json($data,200);
    }

    public function statisMoney($id){
         $obj = Dorm::find($id);
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $tmp=[];
        for ($i = 0; $i < $number_Wash; $i++) {
        $tmp[]= report::where('wash_id','=',($i+1))          
                 -> where('created_at', '=', Carbon::today())
                 ->count()*30;
        } 
         $data['wash_money'] =$tmp;
         return response()->json($data,200);
    }

      public function ajaxGetPromotion(){
        $obj = Dorm::find(7);
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $tmp=[];
        for ($i = 0; $i < $number_Wash; $i++) {
        $tmp[]= report::where('wash_id','=',($i+1))->count()*30;
        } 
         $data['wash_money'] =$tmp;
     return response()->json($data,200);
    }

      public function ajaxGetAnalysis(){
        echo "ajaxGetAnalysis";
    }
        public function StatisInDay($id,$date){
             $obj = Dorm::find($id);
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $tmp=[];
        for ($i = 0; $i < $number_Wash; $i++) {
       $tmp[]= report::where('wash_id','=',($i+1))          
                 -> where('created_at', '=', $date)
                 ->count();
        } 
         $data['wash_id'] =$tmp;
         return response()->json($data,200);
    }
    
        public function StatisInWeek(){
                echo "StatisInWeek";
    }
    
    public function StatisInMonth(){
        echo "StatisInMonth";
    }

       public function StatisInYear(){
        echo "StatisInYear";
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // $obj = Dorm::find($id);
         // $data['url'] =url('easyDetail/'.$id);
         // $data['method'] = "put";
         // $data['obj'] = $obj;
         // return view('easy.add_apartment',$data);
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
        // $obj = Dorm::find($id);
        // $obj->dorm_name = $request['nameBuilding'];
        // $obj->dorm_address = $request['address'];
        // $obj->dorm_numberWash =$request['num'];
        // $obj->dorm_owner = $request['nameOwner'];
        // $obj->dorm_phone = $request['phoneOwner'];
        // $obj->user_id = 1;
        // $obj->save();
        // return redirect(url('easyDetail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  $obj = Dorm::find($id);
        // $obj->delete();
        // return redirect(url('easyDetail'));
    }

}
