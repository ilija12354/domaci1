<?php
    include "dbconfig/konekcija.php";

    $sql="SELECT * FROM vrsta INNER JOIN putovanje ON vrsta.id=putovanje.vrsta_id";
    $rezultat=mysqli_query($con,$sql);


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
        #lista-container{
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
      <div id="lista-container" class="col-lg-9">
      <div id="sva_putovanja">
      <table class="table" id="tabela">
        <thead>
            <tr>
            <th scope="col">Vrsta</th>
            <th scope="col">Ime</th>
            <th scope="col">Opis</th>
            <th scope="col">Akcija</th>
            </tr>
  </thead>
      <?php while($red=$rezultat->fetch_object()){?>
        <div class="col-lg-12">
        <tbody>
        <tr id="<?php echo $red->id ?>">
            <td data-target="vrsta"><?php echo $red->naziv ?></td>
            <td data-target="ime"><?php echo $red->naslov ?></td>
            <td data-target="opis"><?php echo $red->sadrzaj ?></td>
            <td><a href="#" data-role="update" data-id="<?php echo $red->id ?>">Promeni putovanje</a></td>
      </tr>
      </tbody>
      
    <?php } ?>
    </table>
    </div>
      </div>
      </div> 


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Promenite putovanje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">       
                        <div class="form-group">
                            <label>Ime putovanja</label>
                            <input type="text" id="ime" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Opis putovanja</label>
                            <input type="text" id="opis" class="form-control">
                        </div>
                        <input type="hidden" id="id-putovanja" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" id="save" class="btn btn-success">Promenite</a>
      </div>
    </div>
  </div>
</div>   
</div>        
 </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on('click','a[data-role=update]',function(){
                var id = $(this).data('id');
                var ime=$('#'+id).children('td[data-target=ime]').text();
                var opis=$('#'+id).children('td[data-target=opis]').text();
                $('#ime').val(ime);
                $('#opis').val(opis);
                $('#id-putovanja').val(id);
                $('#exampleModal').modal('toggle');
            })
            $('#save').click(function(){
                var id=$('#id-putovanja').val();
                var ime=$('#ime').val();
                var opis=$('#opis').val();
                $.ajax({
                    url:'updateKontorler.php',
                    method: 'post',
                    data:{imeP:ime , opisP:opis , idP:id},
                    success: function(response){
                        $('#'+id).children('td[data-target=ime]').text(ime);
                        $('#'+id).children('td[data-target=opis]').text(opis);
                        $('#exampleModal').modal('toggle');
                    }
                })
            })
        })
        </script>
</body>
</html>