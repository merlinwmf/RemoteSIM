<!doctype>
<html>
<head>
<meta content="ie=10.000" http-equiv="x-ua-compatible">
<meta http-equiv="content-type" content="text/html; charset=utf-8"> 

<title>SIM Board</title>

<link href="./resources/text/style.css" rel="stylesheet" type="text/css"> 
<link href="./resources/text/jquery-ui.css" rel="stylesheet" type="text/css"> 
<link href="./resources/text/ui.notify.css" rel="stylesheet" type="text/css">

<style type="text/css">form input { display:block; width:250px; margin-bottom:5px }</style>

<script src="./resources/js/raphael.2.1.0.min.js"></script>
<script src="./resources/js/justgage.1.0.1.min.js"></script>
<script src="./resources/js/dygraph-combined.js"></script>
<script src="./resources/js/jquery-1.8.2.js"></script>
<script src="./resources/js/highcharts.js"></script>
<script src="./resources/js/modules/exporting.js"></script>
<script src="./resources/js/jquery.js" type="text/javascript"></script>
<script src="./resources/js/jquery-ui.js" type="text/javascript"></script>
<script src="./resources/js/jquery.notify.js" type="text/javascript"></script>

<script language="javascript" type="text/javascript" src="resources/js/jgauge-0.3.0.a3.js"></script> 
<script language="javascript" type="text/javascript" src="resources/js/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="resources/js/jQueryRotate.min.js"></script>
<script language="javascript" type="text/javascript" src="resources/js/jquery.flot.stack.js"></script>

<button onclick="start()">Start to take power data</button>
<button onclick="stop()">Stop to take power data</button> 


<script> 
    
var TotalPower = 0;
var TvPower = 0;
var LampPower = 0;
var SpeakerPower = 0;

function start(){
       
var mydata=setInterval(function() {
		  GetLampPower(); 
        }, 5000); //5 sec
      }

function stop(){
clearInterval(mydata);
}

function GetLampPower(){

	var xmlhttp;

	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			LampPower = xmlhttp.responseText;
            document.getElementById("power").innerHTML="Testing is going!"
                //"Recording.."+LampPower+"W<br>";
		}
	}
		xmlhttp.open("GET","RetrievePower.php",true);
		xmlhttp.send();
}
</script>
</head>
<body>
<p id="power">Test is about to start!</p>    
</body>    
</html>
    