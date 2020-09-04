<?php include('/dispatch/m/jobsAPI/cjob_api.php');?>
<?php include ('../c/nav/createjob-style.php');?>
<?php include ('../c/createjobSource.php');?>
<?php include ('../c/nav/style.php');?>

<!-----------------------------Fetch Lines--------------------------------------------------------------------->  
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/dispatch/m/jobsAPI/loadlinesdata.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Pyf9DzK853LRdgobgwCdMDbi5B-QUMY&libraries=places"></script>
<script>
            var autocomplete;
            
            function initialize() {
                
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
              });
              
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete1, 'place_changed', function() {
              });
              
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete2')),
                  { types: ['geocode'] });
                  
              google.maps.event.addListener(autocomplete2, 'place_changed', function() {
              });
              
            }
</script>

<!-------------------------------------------------------------------------------------------------------------->

<body onload="initialize()">
    
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="overlay-content">
    
    <h2>Create Jobs</h2>
      <div class="row">
      
      <div class="col-lg-8" style="background-color:;  border-radius:5px;width:70%; border:1px solid #ccc">

        <form action="cdjobs.php" method="POST">  
      
     <div class="row">
         <select class="selectT-Mini" name="phonelines" onchange="showUser(this.value)">
        <option value="">L#:</option>
        <option value="1">L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">L4</option>
       </select>
       
     
       <div id="txtHint"></div> 
       <select name="vehicle_type" class="selectCar">
                                         <option>Select Vehicle Type</option>
                                         <option>Sedan</option>
                                         
                                         <option>Compact</option>
                                         <option>Black cab</option>
                                         <option> SUV</option>
                                         <option>Bus</option>
                                         <option>Minibus</option>
                                         <option>Van</option>
                                         <option>Minivan</option>
                                         <option>Limousine</option>
                                         <option>Stretch Limousine</option>
                                         <option> Golf cart</option>
                                         <option>Ambulance</option>
      </select>
      </div>
       
      <div class="row">
          <label class="">PickUp:</label>
       <input id="autocomplete" name="src_addr" type="text" class="input-half"   onFocus="geolocate()"  placeholder="Enter Pickup Address"/><br>
       

        <input class="input-half" type="text-half" placeholder="Cross Street:" name="cross_street">
      <input class="input-half" type="text-half" placeholder="At:" name="at" >
      <input class="input-half" type="text-half" placeholder="Service:" name="service"><br>
      
         <label>DropOff :</label>
        <input  id="autocomplete1"  name="dest_addr" type="text"  class="input-half"    onFocus="geolocate()" placeholder="Enter Drop Address"/><br>
       
        <!--<label>Stop1 :</label>
        <input  id="autocomplete2"   name="dest_addr2" class="input" type="text"  placeholder="If Stop1"><br>
          <label>Stop2 :</label>
       <input  id="autocomplete3"  name="dest_addr3" class="input" type="text"  placeholder="If Stop2"><br>-->
       
       
        <label>Time Assigned:</label> <br> </br>
        <?PHP $now=date("Y-m-d h:i");?>
        <input class="" type="text-half" placeholder="" name="timing" value="<?PHP echo $now;?>">
       
        <select class="selectT" name="time_assigned">
            
        <option>ASAP</option>
        <option>Later</option>
         <option>Price Check</option>
        <option>5min</option>
        <option>10min</option>
        <option>15min</option>
        <option>20min</option>
        <option>30min</option>
        <option>45min</option>
        <option>1hr0min</option>
        <option>1hr30min</option>
        <option>2hr0min</option>
        </select>
        
       <?php echo include('/home/aidifxin/cloud/dispatch/m/driverAPI/driverslistdropdown-api.php');?>
      <br>
      
      
      <input type="text" name="comment" placeholder="Comment">
      
      <br>
      <input class="input-half" type="text-half" placeholder="First Mile Charge" name="fmile_charge" >
      <input class="input-half" type="text-half" placeholder="Distance Charge" name="distance_charge">
       <br>
         <button class="btn  w3-green" type="submit" name="caljob">Calcute</button>
      <button class="btn w3-red" type="reset">Clear</button>
     
      </div>
     
      
       </form>
         
     </div>
    
      
     <div class="col-lg-4" style="background-color:<?PHP echo $colormodeComponent;?>;  border-radius:5px;width:30%; border:1px solid #ccc">
      <center><h4>Drivers Avalible and ETA</h4></center>
      <hr>
       <br><div id="td"></div><br>
       
      </div>
      
    </div>

  </div>
 
</div>

<script>
$(document).ready(function(){

            load_data();
            
 function load_data(acq){
  $.ajax({
   url:"/dispatch/m/driverAPI/driversETA.php",
   method:"POST",
   async: "false",
   data:{acq:acq},
   success:function(data)
   {
    $('#td').html(data);
   }
  });
 }
 $('#autocomplete').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 
});
</script>
</body>
<?php include('createJobFooter.php');?>