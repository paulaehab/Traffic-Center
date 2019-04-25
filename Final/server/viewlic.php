
<?php
// require the file of db connection first
require 'db_connection.php';

$national_id=$_GET["nationalid"];


$sql = "SELECT *
		FROM person,personal_license
    WHERE national_id=national_id
    AND person.national_id=$national_id";

    $query = mysqli_query($conn,$sql);

    if($conn->query($sql) == TRUE){
}else{
  /*echo '<script type="text/javascript">
 alert("الرقم القومى خاطىء");
  location="../index.html";
  </script>';
*/
 echo "Error: " . $sql . "<br>" . $conn->error;

}
