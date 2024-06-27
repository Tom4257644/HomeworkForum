<?php
include 'commonredirectanddbconnect.php';
// this is the redirect if user is not logged in and also the connection to the database
if (isset($_GET['alert'])) {
  if (($_GET['alert']) == 'usernametaken') {
      ?>
      <div class="alert alert-danger" role="alert">
    username taken
  </div>
<?php
// if the username is taken and the alert is sent through in the get array then it will display a alert.
  }
}
?>
<div class="row py-5 px-5"> 
<form method="post" action="sendcreateprofile.php">

  <p> Student username
    <input maxlength=20 name="studentusername" size="40">
  </p>
  <p> Student password
    <input maxlength=64 type="password" name="studentpassword" size="40">
  </p>
  <!-- this part of the form is for the new usernames and passwords  -->

  <label for="year">
      Choose the students year level
    </label>
    <select name="studnetyearlevel">
      <option value="13">
        13
      </option>
      <option value="12">
        12
      </option>
      <option value="11">
        11
      </option>
      <option value="10">
        10
      </option>
      <option value="9">
        9
      </option>
    </select>
    <!-- this part of the form is for selecting the year level of the new account -->

    <?php
    if ($_SESSION['occupation'] == 'admin') {
    ?>
<br>
    <label for="profile type">
      Choose the profile type
    </label>
    <select name="profiletype">
      <option value="student">
        Student
      </option>
      <option value="teacher">
        Teacher
      </option>
      <option value="admin">
        Admin
      </option>
    </select>
    <?php
    // the above is only for admins and allows them to create anytype of account they want
    }
    else {
      ?>
      <label for="profile type">
      Only admin can create teacher or admin accounts -
    </label>
    <select name="profiletype">
      <option value="student">
        Student
      </option>
      </select>
      <?php
      // the above code is for telling teachers that they can only create studnet accounts 
    }
    ?>
  <p> 
    <input type="submit" name="submit" value="Create account">
  </p>   
</form>
<!-- this form is for creating a new account -->

<a href="index.php?page=profilepage"> 
  go back 
</a>
<!-- this is the to go back to the profile page if the user decides they dont want to create a new account -->
</div>




