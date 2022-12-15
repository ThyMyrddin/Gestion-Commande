<?php 

session_start();
include "connexion.php";
if(isset($_SESSION["id"])){

    $id=$_SESSION["id"];
if(isset($_GET["sub"])){
    $sql="select * from produit";
    $res=mysqli_query($link,$sql);
    while($q=mysqli_fetch_assoc($res)){
        $code=$q["code_article"];
        $qtt=$_GET["$code"];
        $date = date('y-m-d');
        $sq="insert into commande (date_commande,code_client,code_article,quantite)
        values ('$date','$id','$code',$qtt)";
        if($qtt<>0){
            $l=mysqli_query($link,$sq);
        }
        

    }
header("location:verifier.php");
}
if(isset($_GET["sup"])){
    $date = date('y-m-d');
    $sql1="delete from commande where date_commande='$date' and code_client=$id";
    $re1s=mysqli_query($link,$sql1);
    header("location:comm.php");
}
}
else{
    header("location:comm.html");
} 
?>