<?php 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database

    $finduserid_sql = "SELECT user.userid FROM user WHERE user.username='{$_SESSION['loggedin']}'";
    $finduserid_qry = mysqli_query($dbconnect, $finduserid_sql);
    $finduserid_rs = mysqli_fetch_assoc($finduserid_qry);
    // this is asking the database for the userid of the user who is currently logged in, as their username is stored in the session - loggedin
?>

<div class="row py-5 px-5"> 
    <form method="post" action="sendquestions.php?userID=<?php echo $finduserid_rs['userid']; ?>">
        <p> 
            <textarea maxlength=1000 name="question" class="col-11" rows=6></textarea>
            <!-- set max length here because that is the max the max that will fit in the database -->
        </p>

        <label for="category">Choose category</label>
        <select name="categoryID">
            <?php
                $categoryoptions_sql = "SELECT categories.* FROM categories";
                $categoryoptions_qry = mysqli_query($dbconnect, $categoryoptions_sql);
                $categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry);
                // this is selecting everything from the categories table 

                do {
            ?>
                <option value="<?php echo $categoryoptions_rs['categoryID']; ?>">
                    <?php echo $categoryoptions_rs['categoryName']; ?>
                </option>
            <?php
                } while ($categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry)) 
                // this should display a list of options that is everything in the categorys table until there are no more results.
            ?>
        </select>

        <p> 
            <input type="submit" name="submit" value="Post Question"> 
        </p>
    </form>
 <!-- this is the form for asking a question  -->

</div>