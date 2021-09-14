<?php


   // $db_user="root";
    //$db_pass="";
    //$db_server="localhost";
   // $db_name="putovanjadb";
    
    //objektni pristup
   // $mysqli = new Mysqli($db_server, $db_user, $db_pass, $db_name);


    $con=mysqli_connect("localhost","root","") or die ("Unable to connect");
    mysqli_select_db($con,'putovanjadb');

?>  