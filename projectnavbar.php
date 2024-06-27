
<nav class="navbar navbar-expand-lg bg-test" >
  <div class="container-fluid ">
    <a class="navbar-brand nav-link" href="index.php?page=recentquestions">
      <img src="bookstack.png" alt="photo of books" style="height: 40px; width: 30px;"> 
      HOMEWORK HELP
    </a>
    <!-- this is a link to the homepage  -->
    <button class="navbar-toggler navbar-toggler-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   <i class="bi bi-list nav-link"></i>
   <!-- this is the icon of the dropdown list -->
    </button>
    <!-- this is the dropdown button that is only visable when the screen is too small to hold all the other links on the navbar -->

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="col-lg-10">
        <ul class="navbar-nav">
     
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=unansweredquestions">
              Unanswered Questions
            </a>
          </li>
          <!-- this is the link to the answered questions page -->
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=askaquestion">
              Ask a Questions
            </a>
          </li>
          <!-- this is the link to the ask a question page  -->

          <li class="nav-item">
            <a class="nav-link" href="index.php?page=myquestions">
              My Questions
            </a>
          </li>

          <!-- this is the link to the my questions page -->
        </ul>
      </div>    
        <div class="col-lg-2 ">
          <a class="nav-link" href="index.php?page=loginpage">
            <?php
              if (isset($_SESSION['loggedin'])) {
                echo 'Profile';
              }
              else {
                echo 'Login';
              }
              // this is the link to the profile page, but only if the user is logged in, if they are not then it is the link to the login page.
              ?>
               
          </a>
        </div>
    </div>
  </div>
</nav>
  