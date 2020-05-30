<?php
include('dbcon.php');
?>
<?php
			$user = $_GET['user'];
			$pass = $_GET['pass'];
			$query 		= mysqli_query($conn, "SELECT user_id,password,isadmin FROM user where username='$user'");
			$row		= mysqli_fetch_array($query);
			if ($pass == $row['password']) 
				{
					$id=$row['user_id'];
				if ($row['isadmin']==1)
				{
					header("Location:admin.php?u=$id");
				}
				else
				{
					header("Location:dashboard.php?u=$id");
				}
				}
			else
				{
					$_SESSION["invalid"] = '1';
					echo 'Invalid Username and Password Combination';
					header('location:index.html?invalid=1');
				
				}
?>