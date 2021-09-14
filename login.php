<?php
    session_start();
    require 'dbconfig/konekcija.php';

            if(isset($_POST['login']))
            {
                $username=$_POST['username'];
                $password=$_POST['password'];
                $sql= "SELECT * FROM user WHERE username='$username' AND password='$password'";
                $rezultat=mysqli_query($con,$sql);

                if(mysqli_num_rows($rezultat)>0)
                {
                    //vec postoji ovakav username i pass u bazi registrovanih korisnika, tacnije validni su za onog ko se loguje
                    $_SESSION['username']=$username;    
                    header('location:index.php');    //funkcija koja nas vodi na homepage
                }
            else
            {
                echo '<script type="text/javascript"> alert("Neispravan username ili password!") </script>';
            }
            }
       
?>
