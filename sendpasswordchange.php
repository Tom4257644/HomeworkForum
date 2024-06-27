<?php 
session_start(); include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    if (empty($_POST['newpassword'])) {
        header("Location: index.php?page=profilepage&alert=blank");}
        // this checks to see if the user has submitted a password which is blank and prevents it
        else {
    $hashedpwmres = mysqli_real_escape_string($dbconnect, $_POST['newpassword']);
    // Sanitising password to avoid sql injection attacks
    $hashedpassword = password_hash($hashedpwmres,PASSWORD_DEFAULT);
    // this is hashing the password
    $newusername_sql = "UPDATE user SET password='$hashedpassword' WHERE username='{$_SESSION['loggedin']}'";
    $newusername_qry = mysqli_query($dbconnect, $newusername_sql);
    // this is inserting the new hashed password into the database for the user who is currently logged in
    header("Location: index.php?page=profilepage&alert=successpasswordchange");
    // this is the redirect for if the password change is successful, it will redirect profile page with an alert.
     }
?>