<?php
include "dbconfig/konekcija.php";

if(isset($_POST['imeP'])){
    $ime=$_POST['imeP'];
    $opis=$_POST['opisP'];
    $id=$_POST['idP'];
    $rezultat=mysqli_query($con,"UPDATE putovanje SET naslov = '$ime', sadrzaj='$opis' WHERE id='$id'");
    if($rezultat){
        echo 'Uspeh';
    }else{
        echo'greska';
    }
}







?>