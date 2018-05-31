<?php
//$content = '<html><head><title>Hello</title></head><body>p>helloooooo</p></body></html>';

//echo htmlspecialchars($content);


$cc = highlight_string("
<?php /* Template Name: Example Template */ ?>
if ( is_front_page() ) :
    get_header( 'home' );
elseif ( is_page( 'About' ) ) :
    get_header( 'about' );
else:
    get_header();
endif; ?>
", TRUE);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angular";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO students (datas)
VALUES ($cc)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
	echo $conn->error;
}

$conn->close();
?>