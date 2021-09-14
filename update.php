<?php
    include "dbconfig/konekcija.php";

    $sql="SELECT * FROM vrsta";
    $rezultat=mysqli_query($con,$sql);

    $sql2="SELECT * FROM putovanje";
    $rezultat2=mysqli_query($con,$sql2);

    if(isset($_GET['submit'])){
        $putovanje =$_GET['putovanje'];
        $vrsta =$_GET['vrsta'];

        $sql3 = "UPDATE putovanje SET vrsta_id='$vrsta' WHERE id='$putovanje'";
        if(mysqli_query($con,$sql3)){
            $msg = "Uspešno izmenjeno.";
          } else {
            $msg = "Greška prilikom izmene.";
          }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">      <!--responzivnost-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>GrdicaTravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
			<div class="col-g-12">
				<div class="page-header">
					<center><h2>Izmeni putovanje</h2></center>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-lg-3">
                <?php
                    include "includes/navbar.php";
                 ?>
            </div>

        <div class="row izmeni_putovanje">
            <div class="col-lg-8 "></div>
            <div class="col-lg-8 ">
            <?php if (isset($msg)) { ?>
                            <div class="alert alert-info">
                            <?php echo $msg;  ?>
                            </div>
                        <?php } ?>
                <form action="" method="GET">
                    <select name="putovanje" id="putovanje" class="form-control">
                        <option value="">Izaberi putovanje..</option>
                        <?php
                            while($red2=$rezultat2->fetch_object()){
                        ?>
                            <option value="<?php echo $red2->id; ?>"><?php echo $red2->naslov ; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <select name="vrsta" id="vrsta_id" class="form-control">
                        <option value="">Izaberi vrstu..</option>
                        <?php
                            while($red=$rezultat->fetch_object()){
                        ?>
                            <option value="<?php echo $red->id; ?>"><?php echo $red->naziv; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <br>
                    <input type="submit" id="submit" name="submit" value="Izmeni" class="btn btn-success">
                </form>
            </div>
            <div class="col-lg-8 "></div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>