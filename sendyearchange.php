<?php 
    session_start(); include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $newyear_sql = "UPDATE user SET yearLevel='{$_POST['yeargroup']}' WHERE username='{$_SESSION['loggedin']}'";
    $newyear_qry = mysqli_query($dbconnect, $newyear_sql);
    //this is setting teh new year level for students in the database.
    $_SESSION['yearlevel'] = $_POST['yeargroup'];
    // this is setting the session of the current user to the year level tehy just changed it to
    header("Location: index.php?page=profilepage");
    // this is redirecting the user to the profile page once they have successfully done it, no alert as they can see it on this page
?>