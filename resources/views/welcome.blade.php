<!doctype html>
<html lang="{{ config('app.locale') }}">
<title> Wash's Easy </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {
  height: 100% ;
  background-color: #fff;
  width:100%;
}



.header {
position: relative;
width: 100%;
height: 80px;
margin: 0 auto;
padding: 1px;

}


.footer {
position: relative;
width: 100%;
height: 220px;
margin: 0 auto;
padding: 1px;
background-color: #BEBEBE;
}

.bgimg {
background-image: url('');
background-repeat:no-repeat;
background-size:contain;
background-position:center;
background-size: 100% ;
}
.full-height {
    height: 10vh;
}
.content {
    text-align: right;
}

.title {
    font-size: 84px;

}
.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;

}
.m-b-md {
    margin-bottom: 30px;


}
.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}
.position-ref {
    position: relative;
}
.helvelthica {
            font-family: 'Helvethaicax';
        }
 @font-face {
            font-family: Helvethaicax;
            src: url(font/DB-Helvethaica-X.ttf);
        }

</style>
<body>

  <div class="header helvelthica" id="header">
<div class="position-ref full-height " >
  <img style="" src="{{asset('image/logo.jpg')}}"; style="width:1px;height=1px">

      @if (Route::has('login'))
          <span class="top-right links" style="margin-left: 65%">
              @if (Auth::check())
                  <a href="{{ url('/home') }}" style="font-size: 1.5em">Home</a>
              @else
                  <a href="{{ url('/login') }}" style="font-size: 1.5em">Login</a>                  <a  href="{{ url('/register') }}" style="font-size: 1.5em">Register</a>
              @endif
          </span>
      @endif
</div>
<img src="image/bbg.jpg" style="width: 100%">

<div class="footer helvelthica" id="footer" align ="center" >

<p style="font-size: 2em"><img src="{{asset('image/lo.png')}}">&nbsp&nbsp<b>By Wash's Easy Co.,Ltd.</b> </p>
<hr  style="width:60%">
<div align="center">
<a href="https://www.facebook.com/washeasyKK/"><img style="width:50px" src="{{asset('image/f.png
')}}"></a>&nbsp&nbsp<img style="width:50px" src="image/in.png">
&nbsp&nbsp<img style="width:50px" src="{{asset('image/link.png')}}">&nbsp&nbsp<img style="width:50px" src="{{asset('image/t.png')}}">

  <div class="helvelthica"  style="font-size: 1.5em"><br>
<p><b>CONTACT US</b> &nbsp&nbsp<i class="material-icons">&#xe0af;</i>
 43/3 Moo 8 T.Pasak, A.Muang, Lumphun, Thailand 51000
 &nbsp&nbsp<i class="material-icons">&#xe0b0;</i>(+66)02074428
 &nbsp&nbsp  <i class="material-icons">&#xe0be;</i> admin@waseasy.co.th</p>
 <br><br>
</div>
</div>
</div></div>
</body>
</html>
