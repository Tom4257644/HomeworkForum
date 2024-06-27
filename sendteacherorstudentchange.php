<?php 
    session_start(); 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
    $newusername_sql = "UPDATE user SET studentOrTeacher='{$_POST['studentorteacher']}' WHERE username='{$_SESSION['loggedin']}'";
    $newusername_qry = mysqli_query($dbconnect, $newusername_sql);
    //this is updating whether the logged in user is a student, admin, or teacher.
    $_SESSION['occupation'] = $_POST['studentorteacher']; 
    // this sets the new occupation as the users current session 
    header("Location: index.php?page=profilepage");
    // this redirects the user to the profile page once they have been successful.
?>