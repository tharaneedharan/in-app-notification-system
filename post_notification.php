<?php
include('dbcon.php');
$course_name = $_GET['course_name'];
$course_time1 = $_GET['time1'];
$course_time3 = strtotime(str_replace('/', '-', $course_time1));
$course_time = $course_time3;
$user = $_GET['user'];
$user_id = $_GET['user_id'];
$id=$user_id;
echo $course_time;
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$date = date("Y-m-d H:i:s",$temp);
$time = strtotime($date);
$query 	= mysqli_query($conn, "SELECT isadmin FROM user where user_id='$id'");
$row	= mysqli_fetch_array($query);
$isadmin=$row['isadmin'];
$query 	= mysqli_query($conn, "SELECT user_id FROM user ORDER BY user_id DESC");
$row	= mysqli_fetch_array($query);
$end=$row['user_id'];
if($isadmin!=1)
{
        $string = 'completed';
        $text = $string.' '.$course_name;
            $a=1;
            while($a<=$end)
            {
                if($a!=$user_id)
                {
                    mysqli_query($conn,"INSERT INTO notification(user_id,user, content,time1,type) VALUES ('$a','$user','$text','$time',3)");
                }
                $a=$a+1;
            }
            header("Location:dashboard.php?u=$id");
}
else
{
    $string = 'New course added - ';
        $text = $string.' '.$course_name;
            $a=1;
            while($a<=$end)
            {
                    mysqli_query($conn,"INSERT INTO notification(user_id,user, content,time1,course_time,type) VALUES ('$a','$user','$text','$time','$course_time',1)");
                    $a=$a+1;
            }
                    header("Location:admin.php?u=$id");

}
?>