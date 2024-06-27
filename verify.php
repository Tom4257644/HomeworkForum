<?php 
    session_start();
    $dbconnect = mysqli_connect("localhost","root","","homeworkforum");
    // this is the connection to the database
    $usernameli = mysqli_real_escape_string($dbconnect, $_POST['username']);
      // sanitising username to avoid sql injection attacks
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
      // sanitising password to avoid sql injection attacks
    $username_sql = "SELECT * FROM user WHERE username='$usernameli'";
    $username_qry = mysqli_query($dbconnect, $username_sql);
    // this is getting the information about the users to check the entered usernames and passwords against.
    if(mysqli_num_rows($username_qry)==0)
    {header("Location: index.php?page=loginpage&error=fail");}
    // if there are no usernames that match the username inputted then the user will be redirected and alerted they have the wrong details
    else {
        $validusername = mysqli_fetch_assoc($username_qry);
        $hashedpassword = $validusername['password'];
        // this hashes the password
    if(password_verify($password, $hashedpassword)) {
        $_SESSION['loggedin'] = $usernameli;
        // this sets the session logged in as the username if the username and password are correct. this is so the session logged in can be used throughout the site without constant use of the get array
    $profileinfo_sql = "SELECT user.* FROM user WHERE user.username='$usernameli'";
    $profileinfo_qry = mysqli_query($dbconnect, $profileinfo_sql);
    $profileinfo_rs = mysqli_fetch_assoc($profileinfo_qry);
    // this gets the details of the user who just signed in
    $_SESSION['occupation'] = $profileinfo_rs['studentOrTeacher'];
    $_SESSION['yearlevel'] = $profileinfo_rs['yearLevel']; 
    // this sets the sessions for occupation and yearlevel so they can be used throughout the site without constant use of the get array
    header("Location: profilepage.php");
    // this redirects the user to the profile page once they have been successful, no alert because they can see from this page that they are logged in
    }
    else 
    {header("Location: index.php?page=loginpage&error=fail");}
    // this redirects the user to the login page again if the username and password they entered was wrong.
    }
?>

