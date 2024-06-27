<div class="accordion my-3 " id="<?php echo $question4displaying_rs['questionID']; ?>">
  <div class="accordion-item  ">
    <!-- classes for setting up the bootstrap accordians -->
    <h2 class="accordion-header " id="panelsStayOpen-heading<?php echo $question4displaying_rs['questionID']; ?>">
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $question4displaying_rs['questionID']; ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $question4displaying_rs['questionID']; ?>">
      <!-- for the accordian head that is visable when it hasnt yet been clicked, also to ensure only one of the accordians are opened when one is clicked -->
        <p class="h5 ">
          <?php echo $question4displaying_rs['question']; 
          // for displaying the question on the accordian head
            $cate_sql = "SELECT * FROM `categories` WHERE categories.categoryID={$question4displaying_rs['categoryID']}";
            $cate_qry = mysqli_query($dbconnect, $cate_sql);
            $cate_rs = mysqli_fetch_assoc($cate_qry);
            // getting the category name for the question that is currently being displayed
          ?>
          <br>
          <?php echo $cate_rs['categoryName']; ?> | Asked by <?php echo $question4displaying_rs['username']; 
          // displaying the category and who asked the question
          if ($question4displaying_rs['studentOrTeacher']=='student')  {
            ?>
            | who is a <?php echo $question4displaying_rs['studentOrTeacher'];  ?>
            in year <?php echo $question4displaying_rs['yearLevel'];  ?>
            
          <?php 
          //the above is for students, when they ask a question it tells everyone they are students and what year level they are
          }
          ?>
          <!-- displaying the category name that was just taken from the database -->
          <br>         
          <?php
            if ( mysqli_num_rows($ans_qry) == 0) 
            {echo "this question is currently unanswered";}
            // if there are no answers then this informs the user so.
            else {echo "this question has been answered";}
            // if there are answers then this informs the user so.
          ?>  
        </p>
      </button>
    </h2>
      <div id="panelsStayOpen-collapse<?php echo $question4displaying_rs['questionID']; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $question4displaying_rs['questionID']; ?>">
        <div class="accordion-body">
          <?php 
            if ( mysqli_num_rows($ans_qry) == 0) {
              echo "this question is currently unanswered";}
              // if the question isnt answered it will display a message saying so 
            else { 
              do { 
                // if the question is answered then it will display the answers
          ?>
                <div class="answer"> 
                  <p class="nameofanswerer px-1">
                    <?php 
                      echo 'Answered by ';
                      echo $ans_rs['username'];
                      //displaying the name of the answerer
                      if ($ans_rs['studentOrTeacher']=='student')  {
                        ?>
                        | who is a <?php echo $ans_rs['studentOrTeacher'];  ?>
                        in year <?php echo $ans_rs['yearLevel'];  ?>
                      <?php 
                      //the above is for students, when they answer a question it tells everyone they are students and what year level they are
                      }
                      ?>
                  </p>
                  <p class="answertext px-3 py-1" >
                    <?php
                      echo $ans_rs['answer']; 
                      // printing the answer from the database
                    if (isset($_SESSION['loggedin'])) 
                    // the below is only if the user is logged in 
                    {
                    if ($_SESSION['occupation'] == 'admin' || $_SESSION['loggedin'] == $ans_rs['username'])
                    {
                    ?>
                     <a class="danger" href="deleteanswers.php?answerid=<?php echo $ans_rs['answerID']; ?>"> 
                    delete answer 
                    </a>
                    <?php
                    }
                    } 
                    // the above code allows users who are admins or who own (who submitted) the answers to delete them
                    ?> 
                  </p>
                  
                  </div>
                  <br>
                    <br>
                    <?php
                  } 
                  while ($ans_rs = mysqli_fetch_assoc($ans_qry));
                  // this loops so all the answers in the database are displayed
                }
          ?>
          <br>
          <p class="danger"> 
              <?php 
              if (!isset($_SESSION['loggedin'])) {
                echo 'you must be logged in to submit an answer';
              } 
              // if the user isnt logged in then they shouldnt be allowed to submit an answer so they will be told that
            
            else { 
              // if the user is logged in they can submit an answer
              ?>
            </p>
            <br> submit an answer
          <form class="" method="post" action="sendanswers.php?questionID=<?php echo $question4displaying_rs['questionID']; ?>">
            <p> 
            <textarea maxlength=1000 name="answer" class="col-11" rows=6></textarea>
            </p>
            <p> 
              <input type="submit" name="submit" value="Post Answer">
              
            </p>     
            </form>
            <!-- above is the form for posting an answer to the database (it sends user to a page that inserts the answer into teh database) -->
            <?php } 
            
                    if (isset($_SESSION['loggedin'])) 
            {
              if ($_SESSION['occupation'] == 'admin' || $_SESSION['loggedin'] == $question4displaying_rs['username'])
              {
                ?>
                                  <a class="danger" href="deletequestion.php?question=<?php echo $question4displaying_rs['questionID']; ?>"> 
                    delete question 
                </a>
                <br>
                <a href="index.php?page=editquestion&question=<?php echo $question4displaying_rs['questionID']; ?>"> 
                    edit question 
                </a>
                <?php
              }
            } 
            // the above code allows users who are admins or who own (who submitted) the questions to delete them

                    ?> 
        </div>
      </div>
  </div>
</div>



   

