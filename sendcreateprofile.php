<?php
session_start(); 
include 'commonredirectanddbconnect.php';
  // this is the redirect if user is not logged in and also the connection to the database
if (empty($_POST['studentusername'])) {
  header("Location: index.php?page=profilepage&alert=blank");}
  // if the user has tried to change their username to nothing then it wont be allowed 
  else {
$newprofile = mysqli_real_escape_string($dbconnect, $_POST['studentusername']);
  // Sanitising username to avoid sql injection attacks
    $checkusername_sql = "SELECT * FROM `user` WHERE user.username=('$newprofile')";
    $checkusername_qry = mysqli_query($dbconnect, $checkusername_sql);
    $checkusername_rs = mysqli_fetch_assoc($checkusername_qry);
    // this checks to see if a username has been taken already
    if 
    ( mysqli_num_rows($checkusername_qry) != 0) {
        header("Location: index.php?page=createprofile&alert=usernametaken");
        // if the username is taken then the user will be redirected to the page they were at with an alert telling them what happened.
    }
    else {
      if (empty($_POST['studentpassword'])) {
        header("Location: index.php?page=profilepage&alert=blank");}
        // this checks to see if the user has tried to change their password to nothing, which tehy shouldnt be able to so they will be redirected and alerted.
        else {
      $hashedpwmres = mysqli_real_escape_string($dbconnect, $_POST['studentpassword']);
        // Sanitising password to avoid sql injection attacks
      $hashedpassword = password_hash($hashedpwmres,PASSWORD_DEFAULT);
      // this is hashing the inputed password
      $newprofile_sql = "INSERT INTO `user` (`userID`, `username`, `password`, `yearLevel`, `studentOrTeacher`) VALUES (NULL, '$newprofile', '$hashedpassword', {$_POST['studnetyearlevel']}, '{$_POST['profiletype']}');";
      $newprofile_qry = mysqli_query($dbconnect, $newprofile_sql);
      // this is inserting the new user details into the database
      header("Location: index.php?page=recentquestions&alert=success");
      // this is redirecting back to the main page with a success alert 
      }
    }
  }
    ?>