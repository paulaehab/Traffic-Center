<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
</head>
<body>

<?php
// require the file of db connection first
require 'db_connection.php';
// very important notes
//1- the php get the value of html by the (name)o of field not id or any thing else


$national_id=$_GET["nationalid"];
$sql = "SELECT license_number
		FROM personal_license
    WHERE national_id=$national_id";

$query = mysqli_query($conn,$sql);

if($conn->query($sql) == TRUE){

  while ($row = mysqli_fetch_array($query))
  		{
  header('Location: getpersonallic.php?id='.$national_id);
    }
  }











 ?>

 </body>
 </html>
