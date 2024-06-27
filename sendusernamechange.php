<?php 
    session_start(); 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $checkusername_sql = "SELECT * FROM `user` WHERE user.username='{$_POST['newusername']}'";
    $checkusername_qry = mysqli_query($dbconnect, $checkusername_sql);
    $checkusername_rs = mysqli_fetch_assoc($checkusername_qry);
    //this is to check if the username has been taken already 
    if 
    ( mysqli_num_rows($checkusername_qry) != 0) {
        header("Location: index.php?page=profilepage&alert=usernametaken");
    // if username has been taken it will redirect to profilepage with an alert telling the user they cant use that username    
    }
    else {
        if (empty($_POST['username'])) {
            header("Location: index.php?page=profilepage&alert=blank");}
            // this checks to see if the user has submitted a username which is blank and prevents it
            else {
        $newusername = mysqli_real_escape_string($dbconnect, $_POST['newusername']);
          // Sanitising username to avoid sql injection attacks
    $newusername_sql = "UPDATE user SET username='$newusername' WHERE username='{$_SESSION['loggedin']}'";
    $newusername_qry = mysqli_query($dbconnect, $newusername_sql);
    // this is inserting the new username into the database for the user who is currently logged in
    $_SESSION['loggedin'] = $_POST['newusername'];
    // this is setting the new logged in session as the username that was just changed
    header("Location: index.php?page=profilepage");
    // this is redirecting the user to the profile page once they have successfully changed tehir username
        }
    }
?>


