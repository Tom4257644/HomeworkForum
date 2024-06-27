<?php 
    session_start(); 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $finduserid_sql = "SELECT user.userid FROM user WHERE user.username='{$_SESSION['loggedin']}'";
    $finduserid_qry = mysqli_query($dbconnect, $finduserid_sql);
    $finduserid_rs = mysqli_fetch_assoc($finduserid_qry);
    //this is finding the userid that matches the username of the user who is logged in 
    if (empty($_POST['answer'])) {
        header("Location: index.php?page=recentquestions&alert=blank");}
        // if the user has submitted a blank answer they will be redirected with an alert
        else {
    $answer = mysqli_real_escape_string($dbconnect, $_POST['answer']);
    // Sanitising answer to avoid sql injection attacks
    $newanswer_sql = "INSERT INTO answers (userID, questionID, answer) VALUES ({$finduserid_rs['userid']}, {$_GET['questionID']},'$answer')";
    $newanswer_qry = mysqli_query($dbconnect,$newanswer_sql);
    // inserting the new answer into the database
    header("Location: index.php?page=recentquestions");
    // redirecting the user back to the recent questions page
    }
?>



