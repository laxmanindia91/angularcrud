<?php
// process.php

include 'connection.php';
$params = json_decode(file_get_contents('php://input'),true);
//print_r($params);
$errors = array();  // array to hold validation errors
$data = array();        // array to pass back data

// validate the variables ========
if (empty($params['name']))
  $errors['name'] = 'Name is required.';
if (empty($params['email']))
  $errors['email'] = 'Email is required.';
if (empty($params['password']))
  $errors['pasword']='Password is required.';
if (empty($params['phone']))
  $errors['phone'] = 'Phone is required.';

/*if (empty($_POST['superheroAlias']))
  $errors['superheroAlias'] = 'Superhero alias is required.';*/

// return a response ==============

// response if there are errors
if ( ! empty($errors)) {

  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors']  = $errors;
} else {

  $data['recived_name'] = $params['name'];
  $data['recived_email'] = $params['email'];
  $data['recived_password'] = $params['password'];
  $data['recived_phone'] = $params['phone'];

  echo $sql = "INSERT INTO books (name,email,password,phone) VALUES ('".$data['recived_name']."', '".$data['recived_email']."', '".$data['recived_password']."', '".$data['recived_phone']."')";

if ($conn->query($sql) === TRUE) {
    // if there are no errors, return a message
  $data['success'] = true;
    $data['message'] = 'New record created successfully';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

// return all our data to an AJAX call
echo json_encode($data);

$conn->close();