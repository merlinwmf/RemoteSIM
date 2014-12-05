<html>
<body>

<?php 

$username="root";
$password="calplug";
$db="WOP";
$time='2014-10-16 03:32:34 pm';
$device='Speaker';
$power='60';


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
	
$sql='CREATE TABLE PowerConsumption(Time CHAR(30), Device CHAR(30), Power INT)';
if(mysqli_query($conn,$sql)){
echo "The table PowerConsumption is created successfully!<br>";
}
else{
echo "Can't Create New Table: ".mysqli_error($conn).'<br>';
}	

$query = "INSERT INTO PowerConsumption VALUES('$time','$device','$power')";
$result=mysqli_query($conn,$query);
if($result){
echo "Values are inserted successfully.<br>";
}
else{
echo "Insertion failed: ".mysqli_error($conn).'<br>';
}


mysqli_close($conn);

?>

</body>
</html>

