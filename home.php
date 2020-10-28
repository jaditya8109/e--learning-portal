<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}

$con = mysqli_connect('localhost','root');


mysqli_select_db($con, 'quizdbase');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<body>
<div class="container">


	<br> <h1 class="text-center text-primary"> EDIFY </h1><br>
	
	<h2 class="text-center text-success"> Welcome <?php echo $_SESSION['username']; ?> </h2> <br>

<div class="col-lg-8 m-auto d-block">
	<div class="card" >
	<?php
	 $m = " SELECT * FROM questions ";
	 $total_questions = mysqli_num_rows(mysqli_query($con, $m));
	 ?>

		<h4 class="text-center card-header"> Number of Questions: <?php echo $total_questions; ?> </h4>
		<h4 class="text-center card-header"> Type: Multiple Choice </h4>
		<h4 class="text-center card-header"> Estimated Time:</strong> <?php echo $total_questions*1.5; ?> </h4>
	 </div><br>

	 <form action="check.php" method="post">

	 <?php
	 $m = " SELECT * FROM questions ";
	 $total_questions = mysqli_num_rows(mysqli_query($con, $m));

	 for($i=1 ; $i < $total_questions + 1 ; $i++){
	 $q = "SELECT * FROM questions where qid = $i";
	 $query = mysqli_query($con, $q);

	 while ($rows = mysqli_fetch_array($query) ) {
	 	?>
	 	
	 	<div class="card">
	 		<h4 class="card-header"> <?php echo $rows['question']  ?>  </h4>


	 		<?php
	 			 $q = "SELECT * FROM answers where ans_id = $i";
				 $query = mysqli_query($con, $q);

				 while ($rows = mysqli_fetch_array($query) ) {
				 	?>

				 	<div class="card-body">
				 		
				 		<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>"> 
				 		<?php echo $rows['answer']; ?>

				 	</div>

<?php
	 }
	 }
	}

	 ?>


	 <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">

</form>
</div>
</div><br><br>

	<div class="m-auto d-block">
	<a href="logout.php" class="btn btn-primary "> LOGOUT </a>
	</div><br>

	<div>
		<h5 class="text-center">   </h5>
	</div><br><br>


	</div>
	





	
</div>

</body>
</html>