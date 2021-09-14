<?php
    include "dbconfig/konekcija.php";
    $sql="SELECT * FROM vrsta";
    $rezultat=mysqli_query($con,$sql);
    
    if (isset($_POST['submit'])) {
    $vrsta_id=$_POST['vrsta'];
    $naslov = $_POST['naslov'];
    $sadrzaj = $_POST['sadrzaj'];
    

    $sql2 = "INSERT INTO putovanje (naslov, sadrzaj, vrsta_id) VALUES ('" . $naslov . "','" . $sadrzaj . "','" . $vrsta_id . "')";
    if(mysqli_query($con,$sql2)){
        $msg = "Uspešno dodata putovanje.";
      } else {
        $msg = "Greška prilikom dodavanja.";
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
        #insert-container{
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
      <div class="row dodaj_putovanje" id="insert-container">
            <div class="col-lg-12 ">
            <?php if (isset($msg)) { ?>
                            <div class="alert alert-info">
                            <?php echo $msg;  ?>
                            </div>
                        <?php } ?>
                        
                <form action="" method="POST">
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
                    <input type="text" id="naslov" name="naslov" class="form-control" placeholder="Unesi naslov">
                    <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-control" placeholder="Unesi sadrzaj"></textarea>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <input type="submit" id="submit" name="submit" value="Dodaj putovanje" class="btn btn-success">
                        </div>
                </form>
            </div>
            <div class="col-lg-8"></div>
        </div>
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
           $.get( "delete.php?vrsta_id="+vrsta_id);
           // $.get( "kontroler.php?vest_id="+vest_id+" & akcija=obrisiVest", function( data ) {
           
           // });
        }
    </script>
  </body>
</html>