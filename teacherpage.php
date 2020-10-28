<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:teacherlogin.php');
}

$con = mysqli_connect('localhost','root');


mysqli_select_db($con, 'quizdbase');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>teachers panel</title>
</head>
<body>
        <div style="margin-top:10vh;" class= "offset-3 col-md-6">
        <h1 class="text-center text-primary"> EDIFY </h1>
        <h2 class="text-center text-success"> Welcome </h2>
        <br><br>
        <a href="add.php"><button type="button" class="btn btn-primary btn-lg btn-block">Add question to Quiz</button><br></a>
        <a href="result.php"><button type="button" class="btn btn-secondary btn-lg btn-block">See student result</button></a>  
        </div><br><br>
        <div class="m-auto d-block text-center">
        <a href="logout.php" class="btn btn-primary "> LOGOUT </a>
        </div>
        <!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>