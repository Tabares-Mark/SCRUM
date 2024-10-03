<?php
include ('DB.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Id = intval($_POST['Id']);

    $SQLi = "DELETE FROM mylibrary WHERE id = $Id";
    
     // Execute query and check if successful
     if (mysqli_query($Conn, $SQLi)) {
        header("Location: CRUD.php");
    } 
}

?>