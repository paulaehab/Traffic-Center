<!DOCTYPE html>
//to test my code ,should be erased
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


     $requestnumber=$_GET['requestnumber'];
    $vehiclename=$_GET['vehiclename'];
    $vehicletype=$_GET['vehicletype'];
    $vehiclemodel=$_GET['vehiclemodel'];
    $chaseenumber=$_GET['chaseenumber'];
    $motornumber=$_GET['motornumber'];
    $motorvol=$_GET['motorvol'];
    $cylindernumber=$_GET['cylindernumber'];
    $color=$_GET['color'];



    //get the fueltypefrom dropdownmenu
    $fueltype;
    if($_GET['fueltype']=="ben"){
      $fueltype="بنزين";

    }else if($_GET['fueltype']=="gas"){
        $fueltype="غاز طبيعى";

    }else if($_GET['fueltype']=="solar"){
        $fueltype="سولار";

    }






$sql = "INSERT INTO car_information (vehicle_brand, model_name, model_year,chasse_number,motor_number,motor_volume,cylinder_number,color,fuel_type,check_up_date,request_number)
VALUES ('$vehiclename', '$vehicletype', '$vehiclemodel','$chaseenumber','$motornumber','$motorvol','$cylindernumber','$color','$fueltype','123','$requestnumber')";


//$sql="UPDATE car_information
//SET motor_volume=$motorvol,motor_number=$motornumber,model_year=$vehiclemodel,model_name=$vehicletype,chasse_number=$chaseenumber,check_up_date=123,color=$color,fuel_type=$fueltype,cylinder_number=$cylindernumber,vehicle_brand=$vehiclename
//WHERE license_number=$requestnumber";

if ($conn->query($sql) === TRUE) {
  header("Location: ../index.html");//will be a new page
} else{
   echo "Error: " . $sql . "<br>" . $conn->error;
//echo '<script type="text/javascript">
//alert("احدى البيانات ناقصه ارجوك ملىء  جميع البيانات");
//location="../engineer/index.html";
//</script>';
/*
 header("Location: ../personalLic.html");
 echo "<script typetext/javascript'>alert(\"$error\");</script>";
*/

};






 ?>

 </body>
 </html>
