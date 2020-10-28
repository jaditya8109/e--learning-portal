<?php



$con = mysqli_connect('localhost','root');


mysqli_select_db($con, 'quizdbase');

 
if(isset($_POST['submit'])){
	$qid = $_POST['question_number'];
	$question = $_POST['question_text'];
	$ans_id = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	
	$choiceid = array();
	$choiceid[1] = $_POST['choice1id'];
	$choiceid[2] = $_POST['choice2id'];
	$choiceid[3] = $_POST['choice3id'];
	$choiceid[4] = $_POST['choice4id'];

 // First Query for Questions Table

	$query = "INSERT INTO questions (";
	$query .= "qid, question, ans_id )";
	$query .= "VALUES (";
	$query .= " '{$qid}', '{$question}','{$ans_id}' ";
	$query .= ")";

	$result = mysqli_query($con ,$query);
	
	

	//Validate First Query
	if($result){
		for($i=1 ; $i<5 ; $i++){
			$query = "INSERT INTO answers (";
					$query .= "aid, answer, ans_id)";
					$query .= " VALUES (";
					$query .=  "'{$choiceid[$i]}', '{$choice[$i]}', '{$qid}' ";
					$query .= ")";
	
					$insert_row = mysqli_query($con,$query);
					
		}
		$message = "Question has been added successfully";
	}

	




}

		

?>
<html>
<head>
	<title>Add Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>

	<br><br>
	<main>
			<div class="container">
				<h2>Add A Question</h2>
				<?php if(isset($message)){
					echo "<h4>" . $message . "</h4>";
				} ?>
								
				<form method="POST" action="add.php">
						<p>
							<label>Question ID:</label>
							<input type="number" name="question_number" >
						</p>
						<p>
							<label>Question Text:</label>
							<input type="text" name="question_text">
						</p>
						<p>
							<label>Choice 1:</label>
							<input type="text" name="choice1"><span>
							<label>Choice 1 id:</label>
							<input type="number" name="choice1id"></span>
						</p>
						<p>
							<label>Choice 2:</label>
							<input type="text" name="choice2"><span>
							<label>Choice 2 id:</label>
							<input type="number" name="choice2id"></span>
						</p><p>
							<label>Choice 3:</label>
							<input type="text" name="choice3"><span>
							<label>Choice 3 id:</label>
							<input type="number" name="choice3id"></span>
						</p><p>
							<label>Choice 4:</label>
							<input type="text" name="choice4"><span>
							<label>Choice 4 id:</label>
							<input type="number" name="choice4id"></span>
						</p>
						
						<p>
							<label>Correct Option Number</label>
							<input type="number" name="correct_choice">
						</p>
						<input type="submit" name="submit" value ="submit">


				</form>
			</div>

	</main>


	<br>
        <div class="m-auto d-block text-center">
        <a href="logout.php" class="btn btn-primary "> LOGOUT </a>
        </div>







</body>
</html>