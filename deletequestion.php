<?php 
    session_start(); 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $deleteaquestion_sql = "DELETE FROM questions WHERE questions.questionID = {$_GET['question']}";
    $deleteaquestion_qry = mysqli_query($dbconnect,$deleteaquestion_sql);
    // this deletes the questions where the get array tells it what question to delete
    $deleteanswers_sql = "DELETE FROM answers WHERE answers.questionID = {$_GET['question']}";
    $deleteanswers_qry = mysqli_query($dbconnect,$deleteanswers_sql);
    // this deletes all the answers that relate to that question
    header("Location: index.php?page=recentquestions");
    // this redirects the user back to the recent question page after the question and answers have been deleted
?>