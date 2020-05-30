<?php
include('dbcon.php');
$user_id = $_GET['id'];
$sno=$_GET['sn'];
$id=$user_id;
    if($sno!=0)
    {
        mysqli_query($conn,"UPDATE notification SET is_clicked = 1 WHERE sno='$sno'");
    }
    else if ($sno == 'del')
    {
        mysqli_query($conn,"DELETE FROM notification WHERE is_clicked = 1 and user_id='$id'");
    }
    else
    {
        mysqli_query($conn,"UPDATE notification SET is_clicked = 1,is_read=1 WHERE user_id='$id'");
    }
header("Location:dashboard.php?u=$id");
?>
