<?php  
include "connexion.php";
session_start();

if(isset($_GET["submit"])){
    $user=$_GET["username"];
    $pass=$_GET["pass"];
    $sql="select * from client where code_client='$user' and pass='$pass'";
    $q=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($q);
    if(!empty($row)){
        $idu=$row["code_client"];
        $_SESSION["id"]=$idu;
        $_SESSION["pass"]=$pass;
        header("location:comm.php");
    }
    elseif($user=="admin" and $pass=="123456789"){
        $_SESSION["id"]="admin";
        $_SESSION["pass"]="123456789";
        header("location:admin.php");
    }
    else{
        session_destroy();
        header("location:index.html");
    }
}


?>