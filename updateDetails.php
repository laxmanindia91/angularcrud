<?php
// Including database connections
require_once 'database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->id);
$name = mysqli_real_escape_string($con, $data->name);
$email = mysqli_real_escape_string($con, $data->email);
$password = mysqli_real_escape_string($con, $data->password);
$phone = mysqli_real_escape_string($con, $data->phone);
// mysqli query to insert the updated data
$query = "UPDATE books SET name='$name',email='$email',password='$password',phone='$phone' WHERE id=$id";
mysqli_query($con, $query);
echo true;

?>