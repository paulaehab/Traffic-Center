<?php
// require the file of db connection first
require 'db_connection.php';
// veryimportant notes
//1- the php get the value of html by the (name)o of field not id or any thing else

////////// <---- GET THE INFORMATION OF Violation from officer----->////////////

//1-get the infromation of the officer
$PLicenseID=$_GET["licensenum"];
$CLicenseID=$_GET["vichaelnum"];
$VType=$_GET["violation"];
$VPlace=$_GET["violatioplace"];
$Ltaken;
if($_GET['taken']=="yes"){ $Ltaken=1;}
else if ($_GET['taken']=="no"){$Ltaken=0;}
$day=$_GET["day"];
$month=$_GET["month"];
$year=$_GET["year"];
$date=$day.'-'.$month.'-'.$year;

$price; 
if($_GET['val'=="1"]){$price=100;}
if($_GET['val'=="2"]){$price=200;}
if($_GET['val'=="3"]){$price=300;}










if($CLicenseID==''){
    $sql1 = "INSERT INTO pl_violation (VType,VPlace,VDate,license_taken,price,PL_id) VALUES ('$VType','$VPlace','$date','$Ltaken','$price','$PLicenseID' )";
}  

else if ($PLicenseID=='') {
    $sql2 = "INSERT INTO cl_violation (VType,VPlace,VDate,license_taken,price,PL_id) VALUES ('$VType','$VPlace','$date','$Ltaken','$price','$CLicenseID' )";
}




if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE &&$conn->query($sql3) === TRUE) {
 header("Location: ../index.html");
 echo"succed";
} else{
  echo "Error: " . $sql . "<br>" . $conn->error;
echo '<script type="text/javascript">
alert("احدى البيانات ناقصه ارجوك ملىء  جميع البيانات");
location="../personalLic.html";
</script>';


};






 ?>