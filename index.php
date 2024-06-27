
<?php 
  session_start();
  if (!isset($_GET['page'])) 
  {header("Location: index.php?page=recentquestions");} 

  // this should check if the page get array is set, because if it isnt the default should be recentquestions.

  $dbconnect = mysqli_connect("localhost","root","","homeworkforum");

  // this shoudl connect the page to the database so I can pull data out.
  
  
  if (isset($_GET['alert'])) 

  // this should check if the alert array is set otherwise an error will come up saying that the alert get array isnt set
  
  {
  if (($_GET['alert']) == 'success') {
    ?>

    <div class="alert alert-success" role="alert">
  profile successfully created
</div>


<?php
// this should should display a banner informing the user that a profile has been created.


  }

  if (($_GET['alert']) == 'blank') {
    ?>

    <div class="alert alert-danger" role="alert">
  Text fields cannot be blank when submitted
</div>
<!-- this informs the user that they tried to submit a black text field and it didnt work -->

<?php
  }
}
?>
<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Homework Help</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link href="project1.css" rel="stylesheet">

    <!-- setting out the head of the page and linking all the stylesheets -->



      <?php include 'projectnavbar.php'; ?>

      <!-- this is including the common navbar that every page has. -->
      
    </head>
    <body>

      <?php 
      if (($_GET['page']) == 'loginpage') {
        include 'loginpage.php';
      }

      if (($_GET['page']) == 'editquestion') {
        include 'editquestion.php';
      }

      if (($_GET['page']) == 'askaquestion') {
        include 'askaquestion.php';
      }

      if (($_GET['page']) == 'profilepage') {
        include 'profilepage.php';
      }

      if (($_GET['page']) == 'editprofile') {
        include 'editprofile.php';
      }

      if (($_GET['page']) == 'createprofile') {
        include 'createprofile.php';
      }

      if (($_GET['page']) == 'addacategory') {
        include 'addacategory.php';
      }

      if (($_GET['page']) == 'choosedeletecategory') {
        include 'choosedeletecategory.php';
      }

      // including the content of pages that dont have questions to the index page, this way I do not have to add common things like navbar and footer on every page. 
      
 if (($_GET['page']) == 'myquestions') {

  if (!isset($_SESSION['loggedin'])) 
{
  header("Location: index.php?page=loginpage&notloggedin=true");
} 

}

// the above code is to check if the page myquestions has been sent through, has the user logged in and has a session been set becuase if it hasnt then the my questions filters will not be able to look for questions related to a user.


if ($_GET['page'] == 'myquestions' || $_GET['page'] == 'recentquestions' || $_GET['page'] == 'unansweredquestions') {

  // this is checking if the page that has been sent through is one that contains questions, because all these pages are very similar, orginionally they were all seperatly included pages but I decided it was too innefficent.
 




if (isset($_GET['categoryfilter'])) {

  $filter = $_GET['categoryfilter'];

  // if a filter is set then the filter variable is set to that categories id 

  if (($_GET['page']) == 'myquestions') {
    $writing = " AND questions.categoryID IN ($filter)";

    // this adds the WHERE clasue to the queries below if a filter has been set, should filter for a category.

  } else {
    $writing = " WHERE questions.categoryID IN ($filter)";

    // this adds the WHERE clasue to the queries below if a filter has been set, should filter for a category must be different from the one for my questions because the 
    // one for my questions has two filters so must start with AND not WHERE.


  }
  if ($_GET['categoryfilter'] == '1') {
    
    $writing ="";
    // if filter is set to 1, for example if the user has selected the general option which shoudl display all questions, then the writing varible is set to 
    // nothing meaning that no WHERE is added to the query below when getting the questions out of the date base so the results wont be filtered by category.

  }

} else {

  $writing = "";
}


// if no filter is set, for example if the page has just been loaded, then the writing varible is set to nothing meaning that no WHERE 
// is added to the query below when getting the questions out of the date base so the results wont be filtered by category.

?>


<div class="row text-center">
  <p>
    <h1>
      
    <?php


    if (($_GET['page']) == 'unansweredquestions') {
        echo 'Unanswered Questions';
      }
      
      if (($_GET['page']) == 'myquestions') {
        echo 'My Questions';
      }
    
    if (($_GET['page']) == 'recentquestions') {
      echo 'Homework Questions';
      }

    // adds titles for the question pages, cant just echo the page get array because I want a space between recent and questions for example.

    ?>

<br>
<?php


    if (isset($_GET['categoryfilter'])) {
    
      $catname_sql = "SELECT categories.* FROM categories WHERE categories.categoryid='{$_GET['categoryfilter']}'";
      $catname_qry = mysqli_query($dbconnect, $catname_sql);
      $catname_rs = mysqli_fetch_assoc($catname_qry);
      
      echo $catname_rs['categoryName'];

      // based on feedback I will echo the filter title if the page is filtered.
    
    }

    ?>
  
  
    </h1>
  </p>
</div>

<div class="row px-5 ">
  <p>
    <form method="post" action="categoryredirect.php?page=<?php echo $_GET['page']; ?>">
      <label for="category">
        Choose catagory 
      </label>
      <select name="categoryID">
        <?php
          $categoryoptions_sql = "SELECT categories.* FROM categories";
          $categoryoptions_qry = mysqli_query($dbconnect, $categoryoptions_sql);
          $categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry);
          // gets the categories out of the database ready for displaying
          do {
        ?>
          <option value="<?php echo $categoryoptions_rs['categoryID']; ?>">
            <?php echo $categoryoptions_rs['categoryName']; ?>
          </option>
        <?php
        } while ($categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry)) 
        // this form displays the categories using a 'do while there are still rows in the database' loop, and allows users to pick a category.
        ?>
      </select>
      <input type="submit" name="submit" value="Filter"> 
    </form>
       <a href="index.php"> Return to all questions</a>
       <!-- link for bringing user back to a page that displays all the questions -->
  </p>
</div>

<div class="row py-5 ">
  <div class="col px-5 ">
    <!-- divs for question structure -->
    <?php 


if (($_GET['page']) == 'myquestions') {

  $question4displaying_sql = "SELECT questions.* ,user.* FROM questions JOIN user ON questions.userID=user.userID WHERE user.username = '{$_SESSION['loggedin']}' $writing";
  $question4displaying_qry = mysqli_query($dbconnect, $question4displaying_sql);
  // this is requesting all the questions from teh database where the username is equal the username of the current user and 
  // if there is a filter set the writing varible will add in a clasue to only get questions with a specifc category

  if 
    ( mysqli_num_rows($question4displaying_qry) == 0) {
      ?>
      <div class="alert alert-danger" role="alert"> 
        <p class="importanttext">
          You have no questions
        </p>
      </div>
       <?php
       // this should detect if no questions are in the datebase and will tell the user so.
      }
      }

else {
  $question4displaying_sql = "SELECT questions.* ,user.* FROM questions JOIN user ON questions.userID=user.userID $writing ORDER BY whenasked DESC";
  $question4displaying_qry = mysqli_query($dbconnect, $question4displaying_sql);

}

// this is the sql request for the other questions pages, this includes recent questions and unanswered questions, 
// unanswered questions will be filtered out later
// if there is a filter set the writing varible will add in a clasue to only get questions with a specifc category



$question4displaying_rs = mysqli_fetch_assoc($question4displaying_qry); 

// set the data in arrays 



if 
( mysqli_num_rows($question4displaying_qry) != 0) {

  // this ensures the query for answers and attemps to display questions and answers is only run if there are questions in the database matching the filters.


do {

  $ans_sql = "SELECT answers.* ,user.* FROM answers JOIN user ON answers.userID=user.userID WHERE answers.questionID={$question4displaying_rs['questionID']}";
  $ans_qry = mysqli_query($dbconnect, $ans_sql);
  $ans_rs = mysqli_fetch_assoc($ans_qry);


  // I need to use an if statement to get only the questions with no anwsers if unanswered questions was in the page array. 
  if (($_GET['page']) == 'unansweredquestions') {
  if ( mysqli_num_rows($ans_qry) == 0) { 
    include 'commonquestioncontent.php';
     // only displaying questions that have no answers

  }}
  else {
    include 'commonquestioncontent.php';

    // displaying all questions and answers
  }
}
  while ($question4displaying_rs = mysqli_fetch_assoc($question4displaying_qry)); 

  // ensures this is done for every question, so every answer is pulled for every question
}
}
// above is closing off the if statement to ask if questions are on the page
?>

</div>
      
      <?php include 'projectfooter.php'; ?>
      <!-- including the common footer that is present on every page. -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
  </html>


    