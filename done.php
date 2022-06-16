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

$sql="SELECT done FROM task WHERE done !=''";
   $result=$connect->query($sql);
    $json_array = array();
 if ($result->num_rows > 0)
    {
 while ($rows=$result->fetch_assoc())
     {
    // echo $rows['done'] ;
     $json_array[] = $rows;
 }
 print(json_encode($json_array));

}



// if(isset($_POST['complete'])){
//     $done=$_POST['complete'];
//      $task=$_POST['completedtask'];
//      $taskid=$_POST['completedtaskid'];
//     $sql1="UPDATE task SET mytask='',done='$task' WHERE id=$taskid";
//     $result=$connect->query($sql1);
//      	   }
    ?>