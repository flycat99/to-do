<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "plan";
$connect = new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
if($connect){
   // echo "conn";
}else{
    echo "cannot connect to the database";
}


    $sql="SELECT mytask,id FROM task where mytask !=''";
    $result=$connect->query($sql);
    $json_array = array();
    if($result->num_rows>0) {
      while($rows=$result->fetch_assoc()) {
      // echo  $rows['mytask'];
       $json_array[] = $rows;
      }
     print(json_encode($json_array));
    }

?>




     

