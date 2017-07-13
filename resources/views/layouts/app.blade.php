<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wash's Easy</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
        body {
                background-color: #fff;
                font-weight: 100%;
                height: 100vh;
                margin: 0;

            }

             .helvelthica {
            font-family: 'Helvethaicax';
        }

        @font-face {
            font-family: Helvethaicax;
            src: url(/font/DB-Helvethaica-X.ttf);
        }
         
       .inner
{
    display: inline-block;
}
#chartdiv {
    width       : 100%;
    height      : 500px;
    font-size   : 11px;
}   
.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}
.font{
    font-size: 1.7em
}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header" style="width: 100%;" style="height: 100%;">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">

                        <img style="padding-right:70%" src="{{asset('image/logo.jpg')}}"; style="width:2px;height=1px">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right helvelthica font">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><b>Login</b></a></li>
                            <li><a href="{{ route('register') }}"><b>Register</b></a></li>
                        @else
                        <li><a href="/">หน้าหลัก</a></li>
                        <li><a href="{{url('easyDorm')}}">ลูกค้าของคุณ</a></li>
                        <li><a href="{{url('easyDorm/create')}}">เพิ่มลูกค้า</a></li>
                        <li><a href="{{url('manual')}}">คู่มื่อการใช้งาน/การดูแลรักษา</a></li>
                        <li><a href="{{url('about')}}">เกี่ยวกับเรา</a></li>
                        <li><a href="{{url('contact')}}">ติดต่อเรา</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

   

    @extends('footer')
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>

<script type="text/javascript">
    $( "#static_use" ).click(function() {
          var url =  window.location.pathname ;
          var obj = url.split("/");
          var id = obj[2];
          var send = "/statisUse/"+id;
   $.get(send, function(data, status){
        $("#chartdiv").html(data);
          var dataProvider=[];
        var count=1;
     for(var i=0;i<data.number;i++){
            dataProvider.push({
                "เครื่องที่": count++,
                "จำนวนการใช้งาน": data.wash_id[i] ,
                "color": "#D4E810"});
        }
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "serial",
          "theme": "light",
          "dataProvider": dataProvider,
          "valueAxes": [ {
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0,
            "position": "left",
            "title": "Static of Use"
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
    });
});
</script>

<script type="text/javascript">
    $( "#static_money" ).click(function() {
          var url =  window.location.pathname ;
          var obj = url.split("/");
          var id = obj[2];
          var send = "/statisMoney/"+id;
   $.get(send, function(data, status){
        $("#chartdiv").html(data);
        var dataProvider=[];
        var count=1;
     for(var i=0;i<data.number;i++){
            dataProvider.push({"เครื่องที่": count++,
                "จำนวนเงิน": data.wash_money[i] ,
                "color": "#D4E810"});
        }
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "serial",
          "theme": "light",
          "dataProvider": dataProvider,
          "valueAxes": [ {
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0,
            "position": "left",
            "title": "Static of Money"
          } ],
          "gridAboveGraphs": true,
          "startDuration": 1,
          "graphs": [ {
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "จำนวนเงิน"
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
    });
});
</script>

<script type="text/javascript">
    $( "#promotion" ).click(function() {
   $.get("/ajaxGetPromotion", function(data, status){
        $("#ajax").html(data);
 var btn = document.createElement("Button");
 //var btn2 = document.createElement("option");
 var t = document.createTextNode("เลือกโปรโมชั่น");
// var t2 = document.createTextNode("เลือกวันที่ต้องการจัดโปรโมชั่น");
    btn.appendChild(t);
 //   btn2.appendChild(t2);
   document.getElementById("ajax").appendChild(btn);
 //  document.getElementById("ajax").appendChild(btn2);
   var x = document.createElement("SELECT");
    x.setAttribute("id", "mySelect");
    document.body.appendChild(x);

    var z = document.createElement("option");
    z.setAttribute("value", "volvocar");
    var t = document.createTextNode("Volvo");
    z.appendChild(t);
    document.getElementById("mySelect").appendChild(z);
    });
});
</script>

<script type="text/javascript">
    $( "#analysis" ).click(function() {
   $.get("/ajaxGetAnalysis", function(data, status){
        $("#ajax").html(data);

    });
});
</script>

<script type="text/javascript">
    $( "#statis_day" ).click(function() {
   $.get("/StatisInDay", function(data, status){
        $("#ajax").html(data);
    });
});
</script>

<script type="text/javascript">
    $( "#statis_week" ).click(function() {
   $.get("/StatisInWeek", function(data, status){
        $("#ajax").html(data);
    });
});
</script>

<script type="text/javascript">
    $( "#statis_month" ).click(function() {
   $.get("/StatisInMonth", function(data, status){
        $("#ajax").html(data);
    });
});
</script>

<script type="text/javascript">
    $( "#statis_year" ).click(function() {
   $.get("/StatisInYear", function(data, status){
        $("#ajax").html(data);
    });
});
</script>
</body>
</html>