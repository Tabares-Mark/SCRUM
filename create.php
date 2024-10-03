    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Add Task</title>
    </head>
    <body>

    <?php
        include ('DB.php');

        // Only process form data if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Title = ($_POST['Title']);
            $Author = ($_POST['Author']);
            
            // Prepare SQL query
            $SQLi = "INSERT INTO mylibrary (Title, Author) VALUES('$Title', '$Author')";
            
            // Execute query and check if successful
            if (mysqli_query($Conn, $SQLi)) {
                header("Location: CRUD.php");
            } 
        } 
    ?>

    <!-- Form for submitting data -->
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST" >

        <label for="Title">Title</label>
        <input type="text" name="Title" id="Title" required>
        <br>
        <label for="Author">Author</label>
        <input type="text" name="Author" id="Author" required>
        <br>
        <input type="submit" value="Add Book">
    </form>

    </body>
    </html>
