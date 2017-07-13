@extends('layouts.app')

@section('content')
<div class="container helvelthica" style="padding: 5%">
<div class=row >

  <h3 style="font-size: 3em" class="helvelthica">กรอกข้อมูลหอพัก/คอนโด</h3>
  <form action="{{$url}}" method="post" style="font-size: 2em">  
 {{method_field($method)}} 
 <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
  
  <div class="form-group">
    <p >ชื่อหอพัก/คอนโด</p>
    <input type="text" class="form-control" name="nameBuilding" style="width: 100%;height:40px;font-size: 0.8em" required="true" value="{{$obj->dorm_name or ''}}">
  </div>

  <div class="form-group">
    <p for="content">ที่อยู่หอพัก/คอนโด</p>
    <textarea class="form-control" name="address" rows="8" cols="40" style="font-size: 0.8em" required="true" >{{$obj->dorm_address or ''}}</textarea>
  </div>

    <div class="form-group">
    <p >จำนวนเครื่องซักผ้า</p>
    <input type="number" class="form-control" name="num" style="width: 100%;height:40px;font-size: 0.8em" required="true" value="{{$obj->dorm_numberWash or ''}}">
  </div>

  <div class="form-group">
    <p >ชื่อลูกค้า</p>
    <input type="text" class="form-control" name="nameOwner" style="width: 100%;height:40px;font-size: 0.8em" required="true" value="{{$obj->dorm_owner or ''}}">
  </div>

<div class="form-group">
    <p >เบอโทรศัพท์ลูกค้า</p>
    <input type="text" class="form-control" name="phoneOwner" style="width: 100%;height:40px;font-size: 0.8em" required="true" value="{{$obj->dorm_phone or ''}}" maxlength="10">
  </div>

  <div align="right" >
  <button type="submit" style="font-size: 0.8em;width: 20%" class="btn btn-primary" >ยืนยัน</button>
  </div>
</form>

  </div>
  
</div>
@stop