<?php
session_start();

   $con = mysqli_connect('localhost','root');
 
   	mysqli_select_db($con,'quizdbase');
   ?>


<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
	.animateuse{
			animation: leelaanimate 0.5s infinite;
		}

@keyframes leelaanimate{
			0% { color: red },
			10% { color: yellow },
			20%{ color: blue }
			40% {color: green },
			50% { color: pink }
			60% { color: orange },
			80% {  color: black },
			100% {  color: brown }
		}
</style>

   </head>
   <body>
     <div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-success text-uppercase animateuse" >  EDIFY </h1>
    	<br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

	         <?php
         // $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
            if(!empty($_POST['quizcheck'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['quizcheck']);
            // print_r($_POST);
            ?>

        	<td>
            <?php
			$m = " SELECT * FROM questions ";
			$total_questions = mysqli_num_rows(mysqli_query($con, $m)); 

            echo "Out of " .$total_questions, " You have attempt ".$checked_count." option."; ?>
            </td>
        
          	
            <?php
            // Loop to store and display values of individual checked checkbox.
            $selected = $_POST['quizcheck'];
            
            $q1= " select * from questions ";
            $ansresults = mysqli_query($con,$q1);
            $i = 1;
            while($rows = mysqli_fetch_array($ansresults)) {
            	$flag = $rows['ans_id'] == $selected[$i];
            	
            			if($flag){
            				// echo "correct ans is ".$rows['ans']."<br>";				
            				// $counter++;
            				$Resultans++;
            				// echo "Well Done! your ". $counter ." answer is correct <br><br>";
            			}else{
            				// $counter++;
            				// echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
            			}					
            		$i++;		
            	}
            	?>
            	
    		
    		<tr>
    			<td>
    				Your Total score
    			</td>
    			<td colspan="2">
	    	<?php 
	            echo " Your score is ". $Resultans.".";
	            }
	            else{
	            echo "<b>Please Select Atleast One Option.</b>";
	            }
	            } 
	          ?>
	          </td>
            </tr>

			<?php 
			$m = " SELECT * FROM questions ";
			$total_questions = mysqli_num_rows(mysqli_query($con, $m));

            $name = $_SESSION['username'];
            $finalresult = " INSERT into user(username,totalques, answerscorrect) values ('$name','$total_questions','$Resultans') ";
            $queryresult= mysqli_query($con,$finalresult); 
            // if($queryresult){
            // 	echo "successssss";
            // }
            ?>
      </table>

      	<a href="logout.php" class="btn btn-success"> LOGOUT </a>
      </div>
   </body>
</html>
