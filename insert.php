<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "plan";
$connect = new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
if($connect){
    echo "conn";
}else{
    echo "cannot connect to the database<br>";
}

function cors() {
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");

        exit(0);
    }
}

cors();
include('index.html');
$jsondata = file_get_contents('mytask.php');
$ad=mysqli_real_escape_string($connect,$_POST['neww']);
$sql="INSERT INTO task(mytask) VALUES('$ad', '$jsondata')" ;
if ($connect->query($sql)=== TRUE){
    ECHO "inserted successfully";
}

// $requestPayload = file_get_contents('php://input');
// 	$object = json_decode($requestPayload, true);
// 	if(empty($object)){
// 		echo json_encode(array("no data has been sent"));
// 	}else{
// 		foreach($object as $row){
// 			$task = $row['task'];
// 			echo $task."<br>";
// 			$sql = "INSERT INTO task(mytask)values('".$row['task']."')";
//             echo$sql."<br>";
// 			$res = $connect->query($sql);
//             if($res == TRUE){
//                 echo "data has been Added";
//             }else{
//                 echo "error adding data";
//             }
// 		}
// 			echo json_encode(array($task));
//     }
	
// $requestPayload = file_get_contents('php://input');
// $object = json_decode($requestPayload, true);
// 		if(isset($_POST['addTask'])){
//           if($_POST['neww']!=""){
// 			$ad=mysqli_real_escape_string($connect,$_POST['neww']);
// 			$sql="INSERT INTO task(mytask) VALUES('$ad')" ;
// 		  if($connect->query($sql)===TRUE){
//             echo json_encode(array($ad));
// 			    header('location:new.php');
// 			 }
// 		   }
//     	 }
        ?>



































 
 