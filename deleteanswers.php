<?php 
    session_start(); include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $deleteanswers_sql = "DELETE FROM answers WHERE answers.answerID = {$_GET['answerid']}";
    $deleteanswers_qry = mysqli_query($dbconnect,$deleteanswers_sql);
    // this is the sql to delete answers from the database, only the answer that has been sent through in the get array
    header("Location: index.php?page=recentquestions");
    // this redirects back to the recent questions page, after answers have been deleted 
?>