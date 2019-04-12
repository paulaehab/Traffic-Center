
<?php
//this File is to open connection with the mysql database
// and we will include this at every php page to make it connected to database
$servername = "localhost";
$username = "root";
$password = "";
$db="Traffic";

// Create connection
//mysqli-> is built in function in th php to connect with mysql database
$conn = new mysqli($servername, $username, $password,$db);
$conn->query("SET NAMES 'utf8'");
$conn->query('SET CHARACTER SET utf8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";







 ?>
