<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
</head>
<body>

  Welcome <?php
$bola=$_GET["nationalid"];
  echo $bola ;
  $sql = "INSERT INTO Person (national id)
VALUES ('$bola')";

$sql2 = "SELECT national id FROM Person";

  ?>
</body>
</html>
