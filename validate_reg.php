<?php
include('dbcon.php');
$user = $_GET['user'];
$pass = $_GET['pass'];
$mail = $_GET['mail'];
$dept = $_GET['dept'];
if($_GET['isadmin'])
{
    $isadmin=1;
}
else
{
    $isadmin=0;
}
$query 	= mysqli_query($conn, "SELECT user_id FROM user ORDER BY user_id DESC");
$row	= mysqli_fetch_array($query);
$end=$row['user_id'];

$query = "SELECT * FROM user where username = '$user' and password = '$pass'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) <= 0)
{
    mysqli_query($conn, "INSERT INTO user(username, password, email, dept, isadmin) VALUES ('$user','$pass','$mail','$dept','$isadmin')");
    $query 	= mysqli_query($conn, "SELECT user_id,isadmin FROM user where username='$user'");
    $row	= mysqli_fetch_array($query);
    $id=$row['user_id'];
    if ($row['isadmin'])
    {
        header("Location:admin.php?u=$id");
    }
    else
    {
        header("Location:dashboard.php?u=$id");
    }
}
else{
    header("Location:index.html?invalid=2");
}
?>