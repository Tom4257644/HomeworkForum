<?php
    header("location: index.php?page={$_GET['page']}&categoryfilter={$_POST['categoryID']}");
    //this is a redirect for when a category is selected it comes here and i use the get and post arrays to transfer information 
    // into a new link to send it back to the place it came from with new stuff in the post array 
    // so questions can be filtered by categories 
?>



