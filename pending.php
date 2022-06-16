<?php 
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "plan";
$connect = new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
if($connect)
{
echo "";
}else
{
echo "cannot connect to the database";
}

$sql="SELECT pending FROM task WHERE pending !=''";
     $result=$connect->query($sql);
  if($result->num_rows>0)
  {
  while($rows=$result->fetch_assoc())
   {
 echo   $rows['pending'];
   $json_array[] = $rows;
  
   }
   print(json_encode($json_array));
    }


    // if(isset($_POST['incomplete'])){
    //      		   $notdone=$_POST['incomplete'];
    //     		   $taskid=$_POST['completedtaski'];
    //      		   $tas=$_POST['completedtas'];
    //      		   $sql2="UPDATE task SET mytask='', pending='$tas' WHERE id=$taskid";
    //      		   $result=$connect->query($sql2);
    //      	   }
             
    ?>