<?php

$deviceLamp='Lamp';
$lampPower=REST_result3();

//set timezone to LA
date_default_timezone_set('America/Los_Angeles');
$t=date("y-m-d H:i:s",time());

//Retrieve Lamp Power data
function REST_request3($device_id)
{

	$request = "http://admin:admin@128.200.55.92:86/rest/nodes/".$device_id." 1";

	$response = simplexml_load_file($request);

    if ($response === False)
        return False;
    else
        return $response;
		
}
                         
function REST_result3(){

	$result = REST_request3("19 88 73"); // Lamp-Meter

	$attribute = (float)$result->node->property->attributes()->value;
	
	return $attribute;
}

$q=$_GET["q"];
echo $lampPower;

$username="root";
$password="calplug";
$db="WOP";

$conn = mysqli_connect('localhost',$username,$password,'mysql');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br>";
  }
 else{
 echo "Connection is successful.<br>";
 }
 

$db_selected=mysqli_select_db($conn,$db);
    
    if(!$db_selected){
        //The database doesnt exit, or we cant see it
    $sql='create database WOP';
	       
        if(mysqli_query($conn,$sql)){
    echo "Database db created successfully.<br>";
    }
        else{
            echo 'Error creating database:'.mysqli_error($conn).'<br>';
        }		
    }
	
$sql='CREATE TABLE PowerConsumption(Time CHAR(30), Device CHAR(30), Power FLOAT(5))';
if(mysqli_query($conn,$sql)){
echo "The table PowerConsumption is created successfully!<br>";
}
else{
echo "Can't Create New Table: ".mysqli_error($conn).'<br>';
}	

$query = "INSERT INTO PowerConsumption VALUES('$t','$deviceLamp','$lampPower')";
$result=mysqli_query($conn,$query);
if($result){
echo "Values are inserted successfully.<br>";
}
else{
echo "Insertion failed: ".mysqli_error($conn).'<br>';
}


mysqli_close($conn);

?>