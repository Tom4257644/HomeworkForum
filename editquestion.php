<?php 
  include 'commonredirectanddbconnect.php';
  // this is the redirect if user is not logged in and also the connection to the database
  $cat_sql = "SELECT questions.* ,user.username FROM questions JOIN user ON questions.userID=user.userID WHERE questions.questionid = {$_GET['question']}";
  $cat_qry = mysqli_query($dbconnect, $cat_sql);
  $cat_rs = mysqli_fetch_assoc($cat_qry); 
  // this is used to get information about the question, eg who asked it for example 
  if (!isset($_SESSION['loggedin']) == $cat_rs['username']) 
  {header("Location: index.php");}
  // this checks to see if the current user is the one who owns the question, if they arent then it will redirect them
  ?>
  <div class="row py-5 px-5"> 
  <form method="post" action="updatequestions.php?userID=<?php echo $cat_rs['userID']; ?>&questionid=<?php echo $_GET['question']; ?>">
    <p> 
      <textarea maxlength=1000 name="question" value="" class="col-11" rows=6><?php echo $cat_rs['question'];?>
    </textarea>
    </p>
     <!-- the above part of the form is where the question is entered -->
  <label for="category">
      Choose catagory 
    </label>
    <select name="categoryID">
    <?php
      $categoryoptions_sql = "SELECT categories.* FROM categories";
      $categoryoptions_qry = mysqli_query($dbconnect, $categoryoptions_sql);
      $categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry);
      // this gets the categories out of the database so they can be displayed
      do {
      ?>
      <option value="<?php echo $categoryoptions_rs['categoryID']; ?>">
      <?php echo $categoryoptions_rs['categoryName']; ?>
      </option>
      <?php
      }
      while ($categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry)) 

      // this displays a dropdown list and prints each category until there are none left in the database
      ?>
    </select>
  <p> 
    <input type="submit" name="submit" value="Post updated Question"> 
  </p>
</form>
<!-- this form is to edit questions -->

</div>