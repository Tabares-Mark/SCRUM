<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Page</title>
</head>
<body>

<?php
include('DB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id = $_POST['Id'];
    $NewTitle = $_POST['NewTitle'];
    $NewAuthor = $_POST['NewAuthor'];

    // Use prepared statements to prevent SQL injection
    $stmt = $Conn->prepare("UPDATE mylibrary SET Title = ?, Author = ? WHERE Id = ?");
    $stmt->bind_param("ssi", $NewTitle, $NewAuthor, $Id);

    if ($stmt->execute()) {
        echo "The book has been updated.";
    } else {
        echo "Error  updating the book: " . $Conn->error;
    }

    $stmt->close();
    $Conn->close();
}
?>

<!-- Form for submitting data -->
<form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="hidden" name="Id" value="<?php echo $_POST['Id']; ?>"> <!-- Hidden field for the Id -->
    
    <label for="Title">Title</label>
    <input type="text" name="NewTitle" id="Title" value="<?php echo $_POST['Title']; ?>" required>
    <br>

    <label for="Author">Author</label>
    <input type="text" name="NewAuthor" id="Author" value="<?php echo $_POST['Author']; ?>" required>
    <br>

    <input type="submit" value="Update">
</form>



</body>
</html>
