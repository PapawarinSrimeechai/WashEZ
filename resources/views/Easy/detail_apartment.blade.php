@extends('layouts.app')

@section('content') 
       <div class="container helvelthica">
 <div class="row">
 <br>
    <div style="font-size:1.5em " >
   <table width="100%" border="1">

		<tr>
		<td width="24%" style="font-size: 1.2em">
			<div align="center" style="margin-bottom: 10%;margin-top: 30%">
		 <img src="{{asset('image/house.png')}}" style="width: 50%;margin-bottom: 5%">
         <br>หอพัก/คอนโด  <font style="color: #F61683">{{$obj['dorm_name']}}</font>
         <br>ที่อยู่ :  <font style="color: #F61683">{{$obj['dorm_address']}}</font>
		 <br>จำนวนเครื่องซักผ้า :  <font style="color: #F61683"'>{{$obj['dorm_numberWash']}}</font>
		 <br>ชื่อลูกค้า :  <font style="color: #F61683">{{$obj['dorm_owner']}}</font>
		 <br>เบอร์โทรศัพท์ของลูกค้า:  <font style="color: #F61683">{{$obj['dorm_phone']}}</font>
			</div>
		

		
		<div  style="margin-bottom: 10%;margin-left: 5%" >
		 <br><hr>
         <span><a id="static_use"><i class="material-icons" style="font-size:36px;color:green">assessment</i>ดูสถิติการใช้งาน</a></span>
          <br><span><a id="static_money"><i class="material-icons" style="font-size:36px;color:orange">monetization_on</i>ดูสถิติการเงิน</a></span>
           <!-- <br><span><a  id="promotion"><i class="material-icons" style="font-size:36px;color:red">add_shopping_cart</i>จัดโปรโมชัน</a></span>
           <br><span><a  id="analysis"><i class="material-icons" style="font-size:36px;color:purple">extension</i>วิเคราะห์และจัดการ</a></span> -->
           
			</div>
		</td>
		<td width="76%" style="font-size: 1.2em">
		 <!-- Resources -->
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

		<div style="margin-left: 5%;margin-top: 5%" id="ajax">
		<!--	Container -->

            <label>สถิติรายวัน &nbsp&nbsp&nbsp&nbsp&nbsp </label>
            <input type="date" name="input_day" id="input_day">
            <input type="submit" name="submit" id="submit" value="ยืนยัน">
        <!-- Chart code -->
        <script>
        var count=1;
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "serial",
          "theme": "light",
         "dataProvider": [
            @for($i=0;$i<$number;$i++)
            {
                "เครื่องที่": count++,
                "จำนวนการใช้งาน": {{$wash_id[$i]}} ,
                "color": "#24F9F9"
            }
            ,
            @endfor
            ],
          "valueAxes": [ {
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0,
            "position": "left",
            "title": "Static of use"
          } ],
          "gridAboveGraphs": true,
          "startDuration": 1,
          "graphs": [ {
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "จำนวนการใช้งาน"
          } ],
          "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
          },
          "categoryField": "เครื่องที่",
          "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20
          },
          "export": {
            "enabled": true
          }

        } );
        </script>
		<div id="chartdiv"></div>	
		<div id="test" align="center">
			<button type="submit" id ="statis_week" style="color: #2C77D7;width: 20%">สถิติรายสัปดาห์</button>
			<button type="submit" id ="statis_month" style="color: #E02727;width: 20%">สถิติรายเดือน</button>
			<button type="submit" id ="statis_year" style="color: #6DB413;width: 20%">สถิติรายปี</button>
		</div>
		</div>
    
		<!-- HTML -->
		
		<div align="right" style="margin: 5%;"><a  href="/easyDorm">Back</a></div>
		</td>
		</tr>
	</table>
	</div>
    
   </div>
  </div>

@stop
