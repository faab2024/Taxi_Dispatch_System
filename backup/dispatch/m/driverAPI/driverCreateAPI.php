<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$rootDir/c.php"; 
if(isset($_POST['actionCreate'])){

$driver_name=$_POST["driver_name"];
$driver_phone=$_POST["driver_phone"];
$driver_email=$_POST["driver_email"];
$home_address=$_POST["home_address"];
$driver_level=$_POST["driver_level"];
$driving_license=$_POST["driving_license"];
$operator_license=$_POST["operator_license"];
$call_sign=$_POST["call_sign"];
$passenger =$_POST["passenger"];
$wheelchair =$_POST["wheelchair"];
$bags =$_POST["bags"];
$type =$_POST["type"];
$color =$_POST["color"];
$license_plate =$_POST["license_plate"];
$vehicle_number =$_POST["vehicle_number"];

$driver_report =$_POST["driver_report"];

$api_key=$_SESSION['id'];


// Perform a query, check for error
if (!mysqli_query($conn,
"INSERT INTO taxi_drivers(
driver_name,
driver_email,
home_address,
driver_phone,
driving_license,
vehicle_number,
operator_license,
driver_id,
passenger,
wheelchair,
pbag,
type,
color,
license_plate,
report,
taxi_comp
)
VALUES(
'$driver_name',
'$driver_email',
'$home_address',
'$driver_phone',
'$driving_license',
'$vehicle_number',
'$operator_license',
'$call_sign',
'$passenger',
'$wheelchair',
'$bags',
'$type',
'$color',
'$license_plate',
'$driver_report',
'$api_key')"
)
) {
  echo("Error description: " . mysqli_error($conn));
}else{
    ?>
       <script>

      location.replace("/dispatch/v/createDrivers.php");
      
      </script>
    
<?php
}

mysqli_close($conn);
}
?>