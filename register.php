<?php
session_start();
    require 'dbconfig/konekcija.php';

    //proveri da li je kliknuto dugme
    if(isset($_POST['submit_btn']))
    {
        //   echo '<script type="text/javascript"> alert("SignUp button is clicked!") </script>';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        if($password==$cpassword)
        {
            $sql= "SELECT * FROM user WHERE username='$username'";
            $rezultat=mysqli_query($con,$sql);
            if(mysqli_num_rows($rezultat)>0)
                {
                    //vec postoji ovakav username
                    echo '<script type="text/javascript"> alert("Username već postoji, unesi ponovo!") </script>';
                }
            else
            {
                $sql= "INSERT into user values('$username','$password')";
                $rezultat=mysqli_query($con,$sql);

                if($rezultat)
                {   
                    $_SESSION['registracija']="Uspesno ste se registrovali. Prijavite se na sajt!";
                    header('location:login.php');
                    
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Error!") </script>';
                }
             }
         }
         else{
            echo '<script type="text/javascript"> alert("Password se ne poklapa!") </script>';

         }

    }
?>
