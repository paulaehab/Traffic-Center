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
  $sql = "SELECT *
      FROM person
      WHERE national_id=$national_id";

  //this mysqli_query is built in function php to do sql query
  $query = mysqli_query($conn,$sql);
  // check if the conncetion with database is good and sql query is done with no problem
  if($conn->query($sql) == TRUE){
  //mysqli_fetch_array-> this php built in function to retrive around all the return of sql query
    while ($row = mysqli_fetch_array($query))
        {
          //$row is take all the values
          //*hint since the return is just on row so i will save all fields in variables
  $firstname= $row["firstname"];
  $secondname=$row["secondname"];
  $thirdname=$row["thirdname"];
  $fourthname=$row["fourthname"];
  $birthdate=$row["birthdate"];
  ////////////////////////////
  //Here is to stroktokinezer like in java the string of birthdate
  $day=strtok($birthdate, '-');
  $month=strtok('-');
  $year=strtok('-').strtok('-');
  //echo strtok($str, ' ').' '.strtok(' ').' '.strtok(' ');
  ///////////////////////////
  $birthlocation=$row["birth_place"];
  $gender=$row["gender"];
  $address=$row["address"];
  ////////
      }
    }
    /////////////// retrive the mobile number of the citizen
    $sql = "SELECT *
        FROM phone
        WHERE national_id=$national_id";
        $query = mysqli_query($conn,$sql);
        // check if the conncetion with database is good and sql query is done with no problem
        if($conn->query($sql) == TRUE){
        //mysqli_fetch_array-> this php built in function to retrive around all the return of sql query
          while ($row = mysqli_fetch_array($query))
              {

        $phone=$row["phone_number"];
            }
          }




  }

?>

  <html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <link rel="shortcut icon" type="image/x-icon" href="../fav.png" />
      <title>الهيئه العامه للمرور</title>
          <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
          <link rel="stylesheet" href="../styles.css">
  </head>
  <body>
    <!-- The nav bar. -->

    <nav class="navbar navbar-expand-sm navbar-light">
      <a class="navbar-brand" href="#"><img src="../logo.png" height="50" width="50"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.html"> الرئيسيه</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  خدمات الرخصه الشخصيه
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href=" ../personalLic.html">استخراج رخصه</a>
              <a class="dropdown-item" href="../personalLicRenew.html">تجديد رخصه</a>
                <a class="dropdown-item" href="../personalLicViolations.html">استعلام عن المخلفات</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  خدمات رخصه المركبات
         </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item active" href="../carLic.html">استخراج رخصه</a>
              <a class="dropdown-item" href="../carLicRenew.html">تجديد رخصه</a>
                <a class="dropdown-item" href="../carViolations.html">استعلام عن المخلفات</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../requests.html">متابعه الطلبات</a>
          </li>

        </ul>
      </div>
    </nav>
      <!-- jumbtron contain logo and introduction. -->

      <header class="jumbotron bg-primary">
        <div class="container align-self-left ">
          <div class="row row-header">
            <div class="col-12 col-sm-3">
                <img src="../logo.png" class="img-fluid">
            </div>
            <div class="col-12 col-sm-6 align-slef-center">
              <h1>خدمات نيابه المرور</h1>
              <p>مرحبا بك فى خدمه  نيابات المرور عبر بوابه الحكومه الالكترونيه</p>
                  </div>
            </div>
          </div>
      </header>
    <!-- The pop up of employee entry. -->
    <div id="employeePanel" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close ml-auto" id="close">
              &times;
            </button>
            <h4 class="modal-title ml-auto  ">برجاء ادخال رقمك القومى</h4>
          </div>
          <div class="modal-body">
            <form>
                <div class="form-group row">
                      <label for="nationalid" class="col-md-2 col-form-label">الرقم القومى<span>:</span> </label>

                      <div class="col-md-6">
                          <input type="text" class="form-control"  name="nationalid" placeholder="الرقم القومى">
                      </div>
                  </div>
              <div class="col-12 col-sm-6 offset-2">
                <button type="submit" class="btn btn-secondary">
                  دخول
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--adress-->
    <div class="row row-content ">
          <div class="col-12 ml-auto adress">
              <h3>خدمه استخراج رخصه شخصيه</h3>

          </div>
        </div>
            <!--Hints-->
          <div class="row row-content ">
                <div class="col-12 ml-auto Hints">
                    <h3>*يجب ادخال كل البيانات المطلوبه و عدم ترك شىء فارغ </h3>
                    <h6 class="warning"><span>*</span>كل المستندات المطلوب رفعها يجب ان تكون صوره من ماسح ضوئى و واضحه حتى لا يتم رفض الطلب</h6>
                </div>
              </div>
            </div>
  <!-- start of user input-->
              <div class="col-12 col-md-9">
                  <form  method="post">
                    <!--name-->
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label"> الاسم رباعى<span>:</span> </label>
                          <div class="col-md-2">
                              <input type="text" class="form-control"  name="firstname"  value= <?php echo"$firstname"; ?> disabled >
                          </div>
                          <div class="col-md-2">
                              <input type="text" class="form-control" name="secondname" value=<?php echo"$secondname"; ?> disabled >
                          </div>
                          <div class="col-md-2">
                              <input type="text" class="form-control"  name="thirdname" value= <?php echo"$thirdname"; ?> disabled    >
                          </div>
                          <div class="col-md-2">
                              <input type="text" class="form-control" name="fourthname"   value= <?php echo"$fourthname"; ?> disabled   >
                          </div>
                      </div>
                          <!--birthday-->
                      <div class="form-group row">
                          <label for="firstname" class="col-md-2 col-form-label">تاريخ الميلاد<span>:</span> </label>
                          <div class="col-md-2">
                              <input type="text" class="form-control"  name="day" value=<?php echo "$day"; ?>  disabled >
                          </div>
                          <div class="col-md-2">
                              <input type="text" class="form-control"  name="month" value=<?php echo"$month"?> disabled  >
                          </div>
                          <div class="col-md-2">
                              <input type="text" class="form-control"  name="year" value=<?php echo"$year"?> disabled    >
                          </div>
                          </div>
                          <!--birthlocation-->

                          <div class="form-group row">
                              <label  class="col-md-2 col-form-label">محل الميلاد<span>:</span> </label>
                              <div class="col-md-4">
                                  <input type="text" class="form-control"  name="birthlocation" value=<?php echo "$birthlocation"; ?> disabled>
                              </div>
                              </div>
                                  <!--Gender-->
                              <div class="form-group row">
                                  <label  class="col-12 col-md-2 col-form-label">النوع:</label>
 																 <div class="col-md-4">
  	                                  <input type="text" class="form-control"  name="birthlocation" value=<?php echo "$gender"; ?> disabled>
  	                              </div>



                              </div>
                                <!--address-->
                              <div class="form-group row">
                                  <label for="text" class="col-12 col-md-2 col-form-label">العنوان :</label>

                                  <div class="col-5 col-md-5">
                                      <input type="text" class="form-control" id="address1" name="address1" value=<?php echo "$address"; ?> disabled>
                                  </div>

                              </div>
                                 <!--Nationalid-->
                              <div class="form-group row">
                                  <label for="email" class="col-md-2 col-form-label">الرقم القومى</label>
                                  <div class="col-md-5">
                                      <input type="text" class="form-control" id="nationalid" name="nationalid"  value=<?php echo " $national_id"; ?> disabled >
                                  </div>
                              </div>
 														 <!--phone number-->
 														 <div class="form-group row">
 																 <label for="email" class="col-md-2 col-form-label"> رقم التليفون</label>
 																 <div class="col-md-5">
 																		 <input type="text" class="form-control" id="nationalid" name="nationalid"  value=<?php echo " $phone"; ?> disabled >
 																 </div>
 														 </div>

                                                         <!--Traffic location-->

                                                         <div class="form-group row">
                                                             <label  class="col-12 col-md-2 col-form-label">وحده الترخيص  </label>
                                                             <div class="btn-group ">
                                                                 <select name="trafficlocation">
                                                       <button type="button" class="btn  dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                       </button>
                                                           <div class="dropdown-menu">

                                                       <option value="1" class="dropdown-item">البساتين </option>
                                                       <option  value="2" class="dropdown-item" >المعادى </option>
                                                       <option  value="2" class="dropdown-item" >حلوان </option>
                                                       </div>
                                                       </select>
                                                              </div>
                                                         </div>
                                                         <!--licensetype-->
                                                               <div class="form-group row">
                             <label  class="col-12 col-md-2 col-form-label">نوع الترخيص  </label>
                                                   <div class="btn-group ">
                                                   <select name="licensetype">
                                   <button type="button" class="btn  dropdown-toggle dropdown-toggle-split " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                       </button>
                                                 <div class="dropdown-menu">

                                                   <option value="1" class="dropdown-item">خاصه </option>
                                                       <option  value="2" class="dropdown-item" >درجه اولى </option>
                                                       <option  value="2" class="dropdown-item" >درجه ثانيه </option>

                                                   </div>
                                                       </select>
                                                        </div>
                                                       </div>




                                      <div class="offset-md-2 col-md-10">
                                          <button type="submit"  class="btn btn-primary" name="submit" >ارسال </button>
                                             </div>


                                             <?php
                                             if(isset($_POST["submit"]))
                                             {
                                               $sql2 = "SELECT license_number
                                               		FROM personal_license
                                                   WHERE national_id=$national_id";
                                                   $query = mysqli_query($conn,$sql2);
                                                   // check if the conncetion with database is good and sql query is done with no problem
                                                   if($conn->query($sql2) == TRUE){
                                                     echo '<script type="text/javascript">
                                                     alert("لديك بالفعل رخصه شخصيه");
                                                     location="../index.html";
                                                     </script>';
                                                   }else{


                                                   $startdate= date("Y-m-d");

                                               //2-add 3 years to the current year to make it as endyear
                                               $num = intval(strtok($startdate, '-')) ;
                                                $enddate=$num+3;
                                                $enddate=$enddate.'-'.date("m").('-').date("d");

                                                ///10-get the trafiic location
                                                $trafficlocation;
                                                if($_POST['trafficlocation']=="1"){
                                                  $trafficlocation="مرور البساتين";
                                                }else if($_POST['trafficlocation']=="2"){
                                                  $trafficlocation="مرور المعادى";
                                                } else if($_POST['trafficlocation']=="3"){
                                                  $trafficlocation="مرور المعادى";
                                                }
                                                //11- get the licnesce type
                                                $licensetype;
                                                if($_POST['licensetype']=="1"){
                                                  $licensetype="خاصه";
                                                }else if($_POST['licensetype']=="2"){
                                                  $licensetype="درجه اولى";
                                                } else if($_POST['licensetype']=="3"){
                                                  $licensetype="درجه ثانيه ";
                                                }

                                                $sql3="INSERT INTO car_license(release_date,end_date,license_type,traffic_location,national_id)
                                                VALUES('$startdate','$enddate','$licensetype','$trafficlocation','$national_id')";


                                                if ($conn->query($sql3) === TRUE ) {

                                              echo '<script type="text/javascript">
                                              alert("تم انشاء رخصه مركبه بنجاح");
                                              location="../index.html";
                                              </script>';
                                                } else{
                                                  echo "Error: " . $sql3 . "<br>" . $conn->error;
                                                echo '<script type="text/javascript">
                                                alert("احدى البيانات ناقصه ارجوك ملىء  جميع البيانات");
                                                location="../personalLic.html";
                                                </script>';


                                                };



                                             }
                                           }
                                             ?>
                 </form>
               </div>




  <!-- Footer -->
  <footer class="page-footer font-small ">
    <div class="footer-copyright text-center py-3">
      © كل الحقوق محفوظه لعبد الله و بسمه و بولا
    </div>

  </footer>
        <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>




            </body>



            </html>
