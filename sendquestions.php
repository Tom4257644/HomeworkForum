<?php 
   session_start(); include 'commonredirectanddbconnect.php';
       // this is the redirect if user is not logged in and also the connection to the database
   if (empty($_POST['question'])) {
    header("Location: index.php?page=recentquestions&alert=blank");}
        // this checks to see if the user has submitted a question which is blank and prevents it
    else {
   $newquest = mysqli_real_escape_string($dbconnect, $_POST['question']);
     // Sanitising question to avoid sql injection attacks
    $newquestion_sql = "INSERT INTO questions (userID, question, categoryID) VALUES ({$_GET['userID']} ,'$newquest','{$_POST['categoryID']}')";
    $newquestion_qry = mysqli_query($dbconnect,$newquestion_sql);
    // this is inserting the new question into the database 
    header("Location: index.php?page=recentquestions");
    // this is sending the successful user back to the home page where they can see the question they have just asked

    }
?>