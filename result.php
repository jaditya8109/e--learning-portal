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
    <style>
    table, th, td {
    border: 1px solid black;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>result</title>
</head>
<body>
    <div class="offset-3 col-md-6 text-cener" style="margin-top:10vh;">
        <h1 class="">Result</h1>
    </div>
    <?php
	 $m = " SELECT * FROM user ";
     $total_result = mysqli_num_rows(mysqli_query($con, $m));
     ?>

     <div class="offset-3 col-md-6" style="margin-top:5vh;">
     <table style="width:100%">
     <tr>
       <th style="color:green; padding-left:em;">Username</th>
       <th></th>
       <th style="color:green;">Marks</th>
     </tr>
     
     <?php
     
        $q = "SELECT * FROM user ";
        $query = mysqli_query($con, $q);
   
        while ($rows = mysqli_fetch_array($query) ) {
    ?>
            
            <tr>
                <th style="padding-left:1em;"> <?php echo $rows['username']  ?>  <th>
                <th style="text-align:left; padding-left:1em;"> <?php echo $rows['answerscorrect']  ?>  <th> 
            </tr>    
        <?php      
        }
        ?>

     </table>    
    </div> 
    <br>
        <div class="m-auto d-block text-center">
        <a href="logout.php" class="btn btn-primary "> LOGOUT </a>
        </div>
</body>
</html>