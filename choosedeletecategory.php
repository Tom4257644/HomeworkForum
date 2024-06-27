<?php 
    include 'commonredirectanddbconnect.php';
    // this is the redirect if user is not logged in and also the connection to the database
?>
<div class="row py-5 px-5"> 
   <p class="red"> DELETEING A CATEGORY WILL ALSO DELETE EVERY QUESTION AND RELATED ANSWER IN THAT CATEGORY.</p>
    <form method="post" action="processdeletecategory.php">
        <label for="categorytbd">Choose category to delete</label>
        <select name="categoryID">
            <?php
                $categoryoptions_sql = "SELECT categories.* FROM categories";
                $categoryoptions_qry = mysqli_query($dbconnect, $categoryoptions_sql);
                $categoryoptions_rs = mysqli_fetch_assoc($categoryoptions_qry);
                // gets the categories from the database
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
            <input type="submit" name="submit" value="Delete Category"> 
        </p>
    </form>
    <!-- this is a form for choosing a category to delete -->
    <a href="index.php?page=profilepage"> 
  go back 
</a>
<!-- this is a link for the user to go back to the profile page if they decide not to delete a category -->
</div>