<?php 
    // If user isn't admin, redirect to index page
    if (!isset($_SESSION['occupation']) == 'admin') 
    {header("Location: index.php");}
    $dbconnect = mysqli_connect("localhost","root","","homeworkforum");
    // connect to the database
?>

<div class="row py-5 px-5"> 
    <!-- this is the div to set the layout of the add a category page -->
    <form method="post" action="sendnewcategory.php">
        <p> 
            <textarea maxlength=40 name="newcategory" class="col-11" rows=6></textarea>
        </p>
        <p> 
            <input type="submit" name="submit" value="Add Category"> 
        </p>
    </form>
    <!-- this is the form for submiting a new category to the database -->
    <a href="index.php?page=profilepage"> 
  go back 
</a>
<!-- this is the link to allow people to return to the profile page. -->
</div>
