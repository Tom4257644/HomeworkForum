<div class="row py-5 px-5"> 

<?php
if (isset($_SESSION['loggedin'])) 
{header("Location: index.php?page=profilepage");}
// this checks if the user is already logged in, if they are then it redirects them to the profile page

?>
<form name="login" method="post" action="verify.php">
  <p> 
    Enter Username
    <input type="text" name="username" value=""> 
  </p> 
  <br>
  <p> 
    Enter Password
    <input type="password" name="password" value=""> 
  </p> 
  <br>
  <input type="submit" name="login" value="submit">
</form>
<!-- this is the form for users to enter their log ins  -->
<?php 
 if (isset($_GET['error'])) { 
?>
<div class="alert alert-danger" role="alert">
  <p> 
    username or password is incorrect 
  </p>
</div>
<!-- this should display an error message if the username or password is invalid -->

<?php
  }
 if (isset($_GET['notloggedin'])) { ?>
  <div class="alert alert-danger" role="alert">
    <p> 
      you must be logged in to access this page 
    </p>
  </div>
  <!-- if the user has been blocked form accessing another page because they were not logged in then this banner should show up to tell them they must log in -->

  <?php
  }
  ?>


</div>