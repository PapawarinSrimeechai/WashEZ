@extends('layouts.app')

@section('content')
       <div class="container helvelthica">
 <div class="row">
    <h1 style="font-size: 3em" class="helvelthica">ลูกค้าที่มีเครื่องซักผ้า Wash Easy ของคุณ</h1>
    <a href="{{url('easyDorm/create')}}"><h2 align="right" class="helvelthica">เพิ่มหอพัก/คอนโด</h2></a>
    <div style="font-size:2em " >
  
    @foreach($obj as $row)
    <div class="col-sm-4" > 
    <hr>

        <img  src="{{asset('image/house.png')}}" style="margin-top: 10%" >
         <br>หอพัก/คอนโด : {{$row->dorm_name}} 
         <br>จำนวนเครื่องซักผ้า :  {{$row->dorm_numberWash}} 
         <div align="right">
         <a class=" btn btn-success" class="inner" style="width: 20%;font-size: 0.7em;" id="detail" href="{{url('easyDetail/'.$row->id)}}">View</a>

         <a class=" btn btn-primary" class="inner" style="width: 20%;font-size: 0.7em;" id="edit" href="{{url('easyDorm/'.$row->id.'/edit')}}">Edit</a>

        <form  action="{{url('easyDorm/'.$row->id)}}"   class="inner" method="post" onsubmit="return(confirm('คุณต้องการลบข้อมูล {{$row->dorm_name}}?'))" >
          {{method_field('DELETE')}}
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger" style="width: 100%;font-size: 0.7em;">Delete</button>
         </form>  
         </div>
</div>
   @endforeach
    
   </div>
  </div>
@stop