<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wash Easy</title>

        <!-- css -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <style media="screen">
            main {
                background-color: #fff;
                color: #636b6f;
               font-family: 'Mitr', sans-serif;
                font-weight: 100%;
                height: 100vh;
                margin: 0;

            }

             .helvelthica {
            font-family: 'Helvethaicax';
        }
        .location{
            width: 15%;
        }

        @font-face {
            font-family: Helvethaicax;
            src: url(font/DB-Helvethaica-X.ttf);
        }
          #map {
        height: 400px;
        width: 100%;
       }
       .inner
{
    display: inline-block;
}
.scrollit {
        float: left;
        width: 10%
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
        </style>
    </head>
    <body>

    <main>
    @yield('content')
    </main>
    

 <!-- script -->


<!-- Resources -->
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