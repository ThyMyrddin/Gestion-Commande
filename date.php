<?php  
session_start();
include "connexion.php";
if(isset($_SESSION["id"])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Commandes Clients</title>
</head>
<style>
    #btn-back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none;
  background-color: #007bff;
  border: none;
  height:20px;
  width:20px;

}
</style>
<body>
    

<header style="width:100%;">
    <img src="" alt="">
    <a  href="admin.php"  style="position:relative;left:900px;top:12px " class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Retour</a>
    <a  href="deconnexion.php"  style="position:relative;left: 900px;top:12px " class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Deconnexion</a>
</header>

<section class="pt-5 pb-5">
  <div class="container">
<?php 
if(isset($_GET["subb"])){
    $date=$_GET["date"];

?>

    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
            <h3 class="display-5 mb-2 text-center">Les Commandes</h3>
            <?php

    $sql="select * from client where code_client 
    in (select code_client from commande where date_commande='$date')";
    $res=mysqli_query($link,$sql);
    while($q=mysqli_fetch_assoc($res)){
        $code=$q["code_client"];
     

        ?>

            <br><h4 class="mb-5 text-center"><?php echo "Code Client :".$code; ?></h4>

            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:10%">Code Article</th>
                        <th style="width:60%">Designation</th>
                        <th style="width:20%">Nombre Carton</th>
                    </tr>
                </thead>
                <tbody>



  <tr>
  <?php  
        $s="select * from commande where code_client='$code' and date_commande='$date'";
        $re=mysqli_query($link,$s);   
while($rg=mysqli_fetch_assoc($re)){

?>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                  <p style="font-weight:bold;"><?php echo $rg["code_article"]; ?></p>
                                </div>
                                <div class="col-md-9 text-left mt-sm-2" style="padding-top:20px;">

                                    
                                </div>
                            </div>
                        </td>

                        <td class="actions" data-th="">
                        <h4><?php 
                        $codea=$rg["code_article"];
                                    $sq="select * from produit where code_article='$codea' ";
                                    $qo=mysqli_query($link,$sq);
                                    $qi=mysqli_fetch_assoc($qo);
                                    echo $qi["designation"];
                                    ?></h4>
                        </td>
                        <td data-th="Quantity" style="padding-top:30px;">
                            <input type="number"  class="form-control form-control-lg text-center" value="<?php echo $rg["quantite"]; ?>" disabled="disabled">
                        </td>
                    </tr>
                    <?php } ?>
                    </form>
                  
                  
                </tbody>
            </table>
            <?php


}}
?>
        </div>
    </div>

</div>
</section>
<button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >

</button>











<script>
    //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>

</html>
<?php  }
else{
    header("location:index.html");
} ?>