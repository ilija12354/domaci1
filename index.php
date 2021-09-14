<?php
    include "dbconfig/konekcija.php";

    $sql="SELECT * FROM vrsta";
    $rezultat=mysqli_query($con,$sql);

    $sql2="SELECT * FROM putovanje";
    $rezultat2=mysqli_query($con,$sql2);
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
      integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q"
      crossorigin="anonymous"
    >
    <style>
        .container{
            border:2px solid black;
        }
        #nesto{
            border:2px solid black;
        }
        </style>
    <title>Pocetna</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div id="nesto" class="col-g-12">
    <?php include "includes/navbar.php";?>

      </div>
      <div id="nesto" class="col-lg-9">
      <div id="sva_putovanja">
      <?php while($red2=$rezultat2->fetch_object()){ ?>
                            <div class="col-lg-12">
                                <h3><?php echo $red2->naslov ?></h3>
                                <p><h4><?php echo $red2->sadrzaj ?></h4></p>
                                <hr>
                             </div>
                        <?php } ?>
      </div>
      </div>
      <div id="nesto" class="col-lg-3">
      <h2>Sortiraj</h2>
                <select name="vrsta" id="vrsta" class="form-control">
                        <option value="999">Izaberi vrstu..</option>
                        <?php
                        //na osnovu ovoga popunim padajuci meni u sortiraj podacima iz baze
                            while($red=$rezultat->fetch_object()){
                        ?>
                            <option value="<?php echo $red->id; ?>"><?php echo $red->naziv; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                <br>
                <p>Pretraži po naslovu: </p>
                <input type="text" id="pretraga" name="pretraga" class="form-control" 
                placeholder="Unesi naslov">
                <br>
                <button onclick="sortiraj();" class="btn btn-primary btn-block">
                Sortiraj na sledeći način</button>
      </div>
    </div>
 </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
		function sortiraj() {
			//pokupimo vrednosti iz polja pomocu jquery-a
			var vrsta=$("#vrsta").val();
			var pretraga=$("#pretraga").val();

            $.post( "pretraga.php", { vrstaP: vrsta, pretragaP: pretraga })
                .done(function( data ) {
			    $("#sva_putovanja").html(data);      //ono sto vrati ova petlja iz pretrage.php treba da upisemo na pocetnoj strani (index, putovanja - div-sve_vesti) i prikazemo putovanja
            });
			//$.post( "kontroler.php?akcija=pretraga", { kategorijaP: kategorija, pretragaP: pretraga })
			
			//});
		}
	</script>
  </body>
</html>