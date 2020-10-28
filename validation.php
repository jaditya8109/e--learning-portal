<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con){
	echo" connection successful";
}else{
	echo " no connection"; 
}

mysqli_select_db($con, 'sessionpractical');

$name = $_POST['user'];
$pass = $_POST['pass'];


$q = " select * from signin  where name = '$name' && password = '$pass' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	if(($name == "admin") &&  
            ($pass == "admin")) { 
				$_SESSION['username'] = $name;
                header("location: teacherpage.php"); 
        }else{
			$_SESSION['username'] = $name;
			header('location:home.php');
		}

}else{

	header('location:login.php');
}



?>