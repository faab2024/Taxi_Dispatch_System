<?php session_start(); ?>
<?php 
include('../c/c.php');
include($dbc);
?>

<?php
/*
//if(isset($_SESSION['id'])){

//header('location: /v/home.php?s=Started'); 


//}else 

if(isset($_POST['sign'])) {

    $pass = $_POST['password'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
    $username = $_POST['username'];
    $compId = $_POST['companyId'];
    
    $phone = $_POST['driver_phone'];

$ret=mysqli_query($conn,"SELECT * FROM  customer WHERE driver_phone='$phone'");
$num=mysqli_fetch_array($ret);
if($num>0){
            $validuser = $num['driver_id'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $num['driver_name'];
			$_SESSION['dphone'] = $num['driver_phone'];
			$_SESSION['username'] = $num['username'];
			$_SESSION['email'] = $num['driver_email'];
			$_SESSION['id'] = $num['driver_id'];
			$_SESSION['taxi_comp'] = $num['taxi_comp'];
			$_SESSION['car_id'] = $num['car_id'];
           
			header('location: /vehicle/v/home.php?s=Started'); 

}else{
echo "Invalid username or password";
}

}
*/
?>
   

<body>
       

            
    <?php include 'nav.php';?>
         


       
        <center> <h4><b>Sign In As Customer</b></h4> </center>
   
            <div class="container">
            <form action="" method="POST">

                <div class="row">
                    
                    
                           <div class="col-25">
                              
                              <form action=""  name="sigin" method="post" >
                                         
                                       <label></label>
                                       <input type="text" placeholder="Enter Mobile Number" name="driver_phone"  /> <br>    
                                      <input type="checkbox" placeholder="" name=""  /> Remember Me
                                      
                                       
      
                                   
                                   
                                     <?PHP echo $reg; ?>
                                     <br></br>
                                     <button type="submit"  class="btn btn-default" name='sign'>Sign In</button>
                                     <br></br>
                                     
                                     <button type="reset" class="btn btn-default">Clear Form </button>
                                     <hr>
                                      <center><p><a href="/vehicle/u/signup.php">Sign Up As Driver</a></p></center>
                            </div>
                          
                 </div>
                
                
                
 
            </form>
            
        
        </div>
        

    <?php include 'footer.php';?>
