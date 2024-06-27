<?php 
    session_start(); 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    if (empty($_POST['question'])) {
        header("Location: index.php?page=recentquestions&alert=blank");}
        // this checks to see if the user has submitted a password which is blank and prevents it
        else {
    $updatedquestions = mysqli_real_escape_string($dbconnect, $_POST['question']);
    // Sanitising questions to avoid sql injection attacks
    $newquestion_sql = "UPDATE questions SET userID = {$_GET['userID']}, question = '$updatedquestions', categoryID = '{$_POST['categoryID']}' WHERE questionID = {$_GET['questionid']}";
    $newquestion_qry = mysqli_query($dbconnect,$newquestion_sql);
    // inserting the new question and information relating to it into the database 
    header("Location: index.php?page=recentquestions");
    // redirect the user back to the home page once the question had been updated.
        }
?>


        

