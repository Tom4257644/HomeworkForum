<?php
    if (!isset($_SESSION['loggedin'])) 
    {header("Location: index.php?page=loginpage");}
    // this is the common redirect added to pages where i want users to be logged in
    $dbconnect = mysqli_connect("localhost","root","","homeworkforum");
    // this is the common database connection i want to be included at the beginning of mulitple pages.
    ?>