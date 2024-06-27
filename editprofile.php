<div class="row py-5 px-5"> 
<?php 
 include 'commonredirectanddbconnect.php';
  // this is the redirect if user is not logged in and also the connection to the database
?>
<p> 
  You are currently logged with account with username : 
<?php 
echo $_SESSION['loggedin'];
// this is to tell the user their username 
?>
</p>
<form method="post" action="sendusernamechange.php">
  <p> 
    <input maxlength=20 name="newusername" size="40">
  </p>
  <p> 
    <input type="submit" name="submit" value="Update Username">
  </p>   
</form>
<!-- this form allow the user to choose a new username with a max length of 20 as thats all that will fit in the database-->

change password
<form method="post" action="sendpasswordchange.php">
  <p> 
    <input maxlength=64 type="password" name="newpassword" size="40">
  </p>
  <p> 
    <input type="submit" name="submit" value="Update password">
  </p>   
</form>
<!-- this form allows the user to choose a new password with a max length of 64 as thats all that will fit in the database -->

<br>
you are currently logged in as 
<?php
$profileinfo_sql = "SELECT user.* FROM user WHERE user.username='{$_SESSION['loggedin']}'";
$profileinfo_qry = mysqli_query($dbconnect, $profileinfo_sql);
$profileinfo_rs = mysqli_fetch_assoc($profileinfo_qry);
// this is to see if the current user is an admin, student or teacher.

if ($profileinfo_rs['studentOrTeacher'] == 'admin') {
  echo 'an admin ';
}
// this tells teh user if they are an admin

else {
  echo 'a ';
  echo $profileinfo_rs['studentOrTeacher']; 
}
// this tells the user if they are a teacher or student, it is different from admin because admin starts with a vowel so need 'an' instead of 'a'.

  ?>
  <br>
  <?php
  if ($profileinfo_rs['studentOrTeacher'] == 'student') {
    echo 'You must be a teacher or admin to change this.';
  }
  // you cannot change what you are (student/teacher/admin) if you are a student

  else {
  ?>
  <br>
  <form method="post" action="sendteacherorstudentchange.php">
    <label for="student or teacher">
      Choose student or teacher
    </label>
    <select name="studentorteacher">
      <option value="student">
        student
      </option>
      <option value="teacher">
        teacher
      </option>
    </select>
    <input type="submit" value="Submit">
  </form>
<?php
}
// this allows the user to change what they are (student/teacher/admin)

?>
<br>
<?php
if ($profileinfo_rs['studentOrTeacher'] == 'student') {
  echo  'you are currently in year', $profileinfo_rs['yearLevel'];
?>
<br>
<form method="post" action="sendyearchange.php">
  <label for="yeargroup">
    Choose Year
  </label>
    <select name="yeargroup">
      <option value="13">
        year 13
      </option>
      <option value="12">
        year 12
      </option>
      <option value="11">
        year 11
      </option>
      <option value="10">
        year 10
      </option>
      <option value="9">
        year 9
      </option>
    </select>
    <input type="submit" value="Submit">
</form>
<?php
// the above code allows users who are students to change what year level they are in

}
?>
<a href="index.php?page=profilepage"> 
  go back 
</a>
<!-- this link will send users back to the profile page if they decide they dont want to change their profile -->

<p>
  please note that username will be publically visable when a question or answer is submitted along with year level for students
</p>
<!-- this tells the user that their data will be visable if they post. -->

</div>