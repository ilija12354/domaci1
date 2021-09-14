<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <title>Login</title>

    <script>
        $(document).ready(function () {
            $('#login_btn').click(function () {
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: {
                        username: $("#userlUnos").val(),
                        password: $("#passwordUnos").val()
                    },
                    success: function (data) {
                        if (data === 'success') {
                            window.location.replace('index.php');
                        } else {
                            alert("Pogresan unos.");
                        }
                    }
                });
            });
        });
    </script>

</head>
<body style="background-color: rgb(17, 181, 228)">  <!--siva pozadina -->
    <div id="main-wrapper">     <!--Dodamo beli box i popunjavamo ga-->
        <center>
            <h2>Uloguj se</h2>
            <img src="imgs/plane.jpg" class="plane"/>
        </center>
        <?php
        if(isset($_SESSION['registracija'])){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alo!</strong> <?php echo $_SESSION['registracija']; ?>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <?php
            unset($_SESSION['registracija']);
        }
            
            ?>
        <!-- zatim nam trebaju 2 labele i 2 text box-a-->
        <form class="mojaForma" action="login.php" method="post">
            <label><b>Username: </label><br>
            <input name="username" type="text" class="inputvalues" id="userdUnos" placeholder="Unesi username" required/><br>
            <label><b>Sifra: </label><br>
            <input name="password" type="password" class="inputvalues" id="passwordUnos" placeholder="Unesi sifru" required/><br>
            <input name="login" type="submit" id="login_btn" value="Login"/><br>
            <a href="register.html"><input type="button" id="register_btn" value="Register"/></a>
        </form>

        
    </div>

</body>
</html>
