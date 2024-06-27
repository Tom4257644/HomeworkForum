 <?php 
   session_start(); include 'commonredirectanddbconnect.php';
   $deleteacat_sql = "DELETE FROM categories WHERE categories.categoryID = {$_POST['categoryID']}";
   $deleteacat_qry = mysqli_query($dbconnect,$deleteacat_sql);
   // this finds the category with the id sent though in the post array, the to be deleted one
   $catofques_sql = "SELECT * FROM `questions` WHERE questions.categoryID = {$_POST['categoryID']}";
   $catofques_qry = mysqli_query($dbconnect, $catofques_sql);
   $catofques_rs = mysqli_fetch_assoc($catofques_qry);
   // this gets all the questions in the 'to be deleted' category
   if    ( mysqli_num_rows($catofques_qry) !== 0) {
   $deletecatque_sql = "DELETE FROM questions WHERE questions.categoryID = {$_POST['categoryID']}";
   $deletecatque_qry = mysqli_query($dbconnect,$deletecatque_sql);
   // this deletes the questions related to that 'to be deleted' category, only if there are some questions in that category
   //catofques = delete answers from questions from category being deleted

    do {
        $check4answers_sql = "SELECT * FROM answers WHERE answers.questionID = {$catofques_rs['questionID']}";
        $check4answers_qry = mysqli_query($dbconnect,$check4answers_sql);
        // this checks for the answers to the deleted questions 
        if    ( mysqli_num_rows($check4answers_qry) !== 0) {
        $deleteanswers_sql = "DELETE FROM answers WHERE answers.questionID = {$catofques_rs['questionID']}";
        $deleteanswers_qry = mysqli_query($dbconnect,$deleteanswers_sql);
            }
        // this deletes the answers to the deleted questions 
 } while ($catofques_rs = mysqli_fetch_assoc($catofques_qry));
 // this continues until there are no questions left
}
   header("Location: index.php?page=profilepage&alert=successdeletecategory");
   // the user is then redirected to the profile page with an alert
?> 