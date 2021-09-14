<?php
session_start();
include "dbconfig/konekcija.php";
$sql2="SELECT * FROM putovanje";
$rezultat2=mysqli_query($con,$sql2);

//da li postoji
    //vadimo parametar vrsta_id pomocu get metode
    if(isset($_GET['vrsta_id'])){
        $vrsta_id=$_GET['vrsta_id'];
        $sql="DELETE FROM putovanje WHERE id= '$vrsta_id'";
        if(mysqli_query($con,$sql)){
            echo "Ubili ste nase omiljeno putovanje :(";
        }else{
            echo "Došlo je do greške prilikom brisanja.";
        }
    }

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
        #delete-kontejner{
            margin-top:50px;
        }
        </style>
    <title>Delete</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div id="nesto" class="col-g-12">
    <?php include "includes/navbar.php";?>

      </div>
      <div class="row izmeni_putovanje" id="delete-kontejner">
      
            <div class="col-lg-12 ">
                <form action="" method="POST">
                <select name="putovanje" id="putovanje" class="form-control">
                        <option value="">Izaberi putovanje kojem zelis da oduzmes zivot!</option>
                        <?php
                            
                            while($red2=$rezultat2->fetch_object()){
                        ?>
                            <option value="<?php echo $red2->id; ?>"><?php echo $red2->naslov ; ?></option>
                        <?php
                            }
                        ?>                           
                       
                    </select>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button"  onclick="obrisi();" class="btn btn-danger btn-block" >Obriši</button>
                    </div>
                </form>
            </div>
      <div id="nesto" class="col-lg-3">
      
      </div>
    </div>
 </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        //funkcija se poziva klikom na dugme obrisi 
        function obrisi() {
            //kad se prikaze padajuci meni sa izborom, moram da izvucem id
           //pomocu JQUERY-ja
           var vrsta_id=$("#putovanje").val();
           $.get( "delete.php?vrsta_id="+vrsta_id, function( data ) {
            alert( data );
            });
           // $.get( "kontroler.php?vest_id="+vest_id+" & akcija=obrisiVest", function( data ) {
           
           // });
        }
    </script>
  </body>
</html>