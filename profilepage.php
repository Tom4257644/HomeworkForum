<div class="row py-5 px-5"> 
<?php  
 include 'commonredirectanddbconnect.php';
     // this is the redirect if user is not logged in and also the connection to the database
if (isset($_GET['alert'])) {
    if (($_GET['alert']) == 'successpasswordchange') {
      ?>
  
      <div class="alert alert-success" role="alert">
    password successfully changed
    </div>
    <!-- this is an alert to tell the user if the password change was successful  -->
  <?php
    }
    if (($_GET['alert']) == 'usernametaken') {
        ?>
    
        <div class="alert alert-danger" role="alert">
      username taken
    </div>

    <!-- this is an alert to tell the user that password change failured because the username already exists  -->
<?php
    }

    if (($_GET['alert']) == 'successfulnewcategory') {
        ?>
    
        <div class="alert alert-success" role="alert">
      New category created
      </div>
    
    <!-- this is an alert to tell the user that they have successfully created a new category -->
    <?php
      }
      if (($_GET['alert']) == 'successdeletecategory') {
        ?>
        <div class="alert alert-success" role="alert">
      Category deleted successfully
      </div>
    
    <!-- this is an alert to tell the user that a category has been successfully deleted  -->
    <?php
      }
  }
  ?>

<p> 
    You are currently logged in as 
    <?php 
        echo $_SESSION['loggedin'];
        // this tells the user who they are logged in as 
    ?>
    <br>
 

    you are currently logged in as 
    <?php 
    if ($_SESSION['occupation'] == 'admin') {
        echo 'an ';
    }

    else {
        echo 'a ';
    }
    echo $_SESSION['occupation'];

    // this tells the user what they are (student, teacher, or admin) there are two different bits because admin begins with 'a' which is a vowel so need to have 'an' before it
    ?>

    <br>

    <?php

        if ($_SESSION['occupation'] == 'student') {
            echo  'you are currently in year', $_SESSION['yearlevel'];

        }
// this tells students what year level they are in 
    ?>

</p>

<a href="logout.php"> 
    Log Out
</a>

<!-- this is a link to allow the users to log out -->
<br>

<a href="index.php?page=editprofile"> 
    Edit Profile
</a>

<!-- this is a link to allow users to go to the edit profile page  -->
<br>

<?php
if ($_SESSION['occupation'] !== 'student') { ?>
<a href="index.php?page=createprofile"> 
    Create another profile
</a>
<!-- this is a link for tecahers and admins to create new accounts  -->
<?php
}

?>
<br>
<?php
if ($_SESSION['occupation'] !== 'student') { ?>
<a href="index.php?page=addacategory"> 
    Add a category
</a>
<!-- this is a link for students and teachers to create a new category  -->
<br>
<a href="index.php?page=choosedeletecategory"> 
    Delete a category
</a>
<!-- this is a link for students and teachers to delete a category -->
<?php
}

?>

</div>