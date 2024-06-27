<?php 
   session_start(); 
   include 'commonredirectanddbconnect.php';
       // this is the redirect if user is not logged in and also the connection to the database
   if (empty($_POST['newcategory'])) {
    header("Location: index.php?page=profilepage&alert=blank");}
    //if the user has submitted an a new category with nothing in it they will not be allowed to do so.
    else {
   $newcat = mysqli_real_escape_string($dbconnect, $_POST['newcategory']);
     // Sanitising category to avoid sql injection attacks
    $newquestion_sql = "INSERT INTO categories (categoryname) VALUES ('$newcat')";
    $newquestion_qry = mysqli_query($dbconnect,$newquestion_sql);
    // this is inserting the new category into the database
    header("Location: index.php?page=profilepage&alert=successfulnewcategory");
    // this is redirecting the user to the profile page with a alert telling them it worked.
    }
?>