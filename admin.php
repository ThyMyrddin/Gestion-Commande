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

    <title>Slection Date</title>
</head>
<body>
<header style="width:100%;">
    <img src="" alt="">
   

    <a  href="deconnexion.php"  style="position:relative;left:1100px;top:12px " class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Deconnexion</a>
</header>

<section class="pt-5 pb-5">
    
  <div class="container">
<form action="date.php" methode="GET">
    <label for="">Entrer une Date</label><br>
    <input type="date" name="date">
    <input type="submit" name="subb" value="Afficher" id="">
</form>
</section>

</body>

</html>
<?php  }
else{
    header("location:index.html");
} ?>