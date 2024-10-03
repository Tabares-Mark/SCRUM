<?php

$DB_server = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "library";
$Conn = "";

$Conn = mysqli_connect($DB_server, $DB_user, $DB_pass, $DB_name);


if($Conn){
     echo "Connection successful";
}
else {
    echo "nope";
}

?>