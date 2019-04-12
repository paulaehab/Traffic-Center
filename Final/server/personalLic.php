<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
</head>
<body>

<?php
// require the file of db connection first
require 'db_connection.php';
// veryimportant notes
//1- the php get the value of html by the (name)o of field not id or any thing else

//////////

//1-get the infromation of the citizen
$firstname=$_GET["firstname"];
$secondname=$_GET["secondname"];
$thirdname=$_GET["thirdname"];
$fourthname=$_GET["fourthname"];
//2- get the citizen birthdate
$day=$_GET["day"];
$month=$_GET["month"];
$year=$_GET["year"];
$birthdate=$day.$month.$year;//add the 3 in one line
echo $birthdate;
//3- get the --birthlocation--
$birthlocation=$_GET["birthlocation"];
//4-get the gender by check wich radio button the user choose
$gender;
if($_GET['radio']=="radio1"){
  $gender="ذكر";

}else if($_GET['radio']=="radio2"){
    $gender="انثى";

}
//5-get citizen --Nationalid--
$nationalid=$_GET['nationalid'];
//6- get the citizen --Mobile--
$mobile=$_GET['telnum'];
//7- get the citzien --address--
$address1=$_GET['address1'];
$address2=$_GET['address2'];
$address=$address1.$address2;
//8-get citizen --relegion--
$relegion;
if($_GET['relegion']=="1"){
  $relegion="مسلم";

}else if($_GET['relegion']=="2"){
    $relegion="مسيحى";

}
//9- get thd citzien idcard
$identfication;
if($_GET['idcard']=="1"){
  $identfication="بطاقه";
}else if($_GET['idcard']=="2"){
  $identfication="باسبور";
}
$sql = "INSERT INTO person (national_id, firstname, secondname,thirdname,fourthname,address,birthdate,religion,gender,nationality,birth_place,medical_report,personal_picture,birth_certificate)
VALUES ('$nationalid', '$firstname', '$secondname','$thirdname','$fourthname','$address','$birthdate','$relegion','$gender','$identfication','$birthlocation','123213','121212','121212')";


$sql2="INSERT INTO phone (phone_number,national_id)
VALUES('$mobile','$nationalid')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



 ?>

 </body>
 </html>
