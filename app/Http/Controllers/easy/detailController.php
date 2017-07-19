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
          $data['status'] = 'money';  
         return response()->json($data,200);
    }

        public function StatisInDay($id,$year){
        $obj = Dorm::find($id);
        $number_Wash = $obj['dorm_numberWash'];
        $data['number'] = $number_Wash ;
        $use=[];
        $money=[];
        $use_month=[];
        $money_month=[];
        $use_year=[];
        $money_year=[];  
        if(strlen($year)>4&&strlen($year)<8)
        {
            $split = explode("-", $year);
            $month = $split[1]; 
            for ($i = 0; $i < $number_Wash; $i++) {
             $use_month[]= report::where('wash_id','=',($i+1))          
                     -> whereMonth('created_at', '=', $month)
                     ->count();
            } 
             for ($i = 0; $i < $number_Wash; $i++) {
             $money_month[]= report::where('wash_id','=',($i+1))          
                     -> whereMonth('created_at', '=', $month)
                     ->count()*30;
            }
        }elseif (strlen($year)>8) {
            $day = $year;  
            for ($i = 0; $i < $number_Wash; $i++) { 
            $use[]= report::where('wash_id','=',($i+1))          
                 -> where('created_at', '=', $day)
                 ->count();
            } 
            for ($i = 0; $i < $number_Wash; $i++) {
            $money[]= report::where('wash_id','=',($i+1))          
                     -> where('created_at', '=', $day)
                     ->count()*30;
            } 
        }else{    
            for ($i = 0; $i < $number_Wash; $i++) {
             $use_year[]= report::where('wash_id','=',($i+1))          
                     ->whereYear('created_at', '=', $year)
                     ->count();
            } 
             for ($i = 0; $i < $number_Wash; $i++) {
             $money_year[]= report::where('wash_id','=',($i+1))          
                     ->whereYear('created_at', '=', $year)
                     ->count()*30;
            }
        }     
         $data['wash_id'] =$use;
         $data['wash_money'] =$money;
         $data['use_month'] =$use_month;
         $data['money_month'] =$money_month;
         $data['use_year'] =$use_year;
         $data['money_year'] =$money_year;
       return response()->json($data,200);
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
