<?php
session_start();
include('dbcon.php');
$userr_id = $_GET['user_id'];
$s='s';
$m='m';
$h='hr';
$d='d';
$id=$userr_id;
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$date = date("Y-m-d H:i:s",$temp);
$timerr = strtotime($date);
if(isset($_POST['view']))
{
if($_POST["view"] != '')
{
    $update_query = "UPDATE notification SET is_read = 1 WHERE user_id='$userr_id'";
    mysqli_query($conn, $update_query);
}
$query = "SELECT * FROM notification where user_id = '$userr_id' ORDER BY sno DESC";
$result = mysqli_query($conn, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $sno=$row['sno'];
  $checkTime = $row['time1'];
  date_default_timezone_set('GMT');
  $temp= strtotime("+5 hours 30 minutes"); 
  $date = date("Y-m-d H:i:s",$temp); 
  $loginTime = strtotime($date);
  $diff = $checkTime - $loginTime;
  $time1=abs($diff);
  $time2=intval($time1/60);
  if ($time1<60)
  {
    $time3 = "Just now";
  }
  else if ($time1<3600)
  {
    $time3 = $time2.' '.$m.' '."ago";
  }
  else if ($time1<86400)
  {
    $time2=intval($time2/60);
    $time3 = $time2.' '.$h.' '."ago";
  }
  else if ($time1>86400)
  {
    $time2=intval($time2/3600);
    $time3 = $time2.' '.$d.' '."ago";
  }
 $output .= '
   <li>

   <a href="is_clicked.php?sn='.$sno.'&&id='.$userr_id.'" style="color:#fcba03"><strong>'.$row["user"].' </strong></a><a>'.$row["content"].' <small class="pull-right">'.$time3.' </small></a>
   
   </li>
   
   <li class="divider"></li>
   ';
 }
 $output .=' <li>
 <div class="all-button"><a href="is_clicked.php?sn=0&&id='.$userr_id.'">
   <em class="fa fa-inbox"></em> <strong>Mark all as Read</strong>
 </a></div>
 </li>
 <li class="divider"></li>
 <li>
 <div class="all-button"><a href="is_clicked.php?sn=del&&id='.$userr_id.'">
   <em class="fa fa-inbox"></em> <strong>Delete Read</strong>
 </a></div>
</li>';
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic" align="center" ><strong>No Notifications Found</a></li>';
}

$status_query = "SELECT * FROM notification WHERE is_read=0 and user_id='$userr_id'";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);
echo json_encode($data);
}
$query = "SELECT * FROM notification where user_id = '$id' and type=1 ORDER BY sno DESC";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $sno=$row['sno'];
    $t1 = $row['course_time'];
    $t2=$timerr;
    $diff = $t2 - $t1;
    $time1=abs($diff);
    if (($t1<=t2) && $row['is_sent']==0)
     {
        $subject = $row['content'] ;
      	$search = 'New course added -  ' ;
	      $trimmed = str_replace($search, '', $subject) ;
        $string = 'is about to start';
        $text = $trimmed.' '.$string;
        mysqli_query($conn,"INSERT INTO notification(user_id, user, content, time1, type,is_sent) VALUES ('$id','Admin','$text','$timerr',3,1)");
        mysqli_query($conn, "UPDATE notification SET is_sent = 1 WHERE sno = '$sno'");
    }
 }
}

?>