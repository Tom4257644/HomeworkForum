<?php 
    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['occupation']);
    unset($_SESSION['yearlevel']);
    // this unsets all the sessions involved with a user's account
    header("location: index.php?page=recentquestions")
    // this redirects the user to the home page once they have been logged out
?>