<?php
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$query = "DELETE FROM books WHERE id=$data->id";
mysqli_query($con, $query);
echo true;
?>