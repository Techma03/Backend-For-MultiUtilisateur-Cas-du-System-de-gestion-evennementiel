<?php 
 include_once "./config/connect.php";
 session_start();

 //Obetenir les informations que pour l'utilisateur connecter;
 
 if(isset($_GET['name_service'])=='commerce'){
    //1. CAS D'ECOMMERCE
    $userConnected = $_SESSION['email'];
    $SqlEcom = "SELECT * from product INNER JOIN users ON users.id = product.user_id WHERE email = '{$userConnected}'";
    $execute = mysqli_query($connect,$SqlEcom);
    $Rowcount = mysqli_num_rows($execute);
    if($Rowcount > 0){
        while($row = mysqli_fetch_assoc($execute)){
            $name_product = $row['name_product'];
            $desc_product = $row['desc_product'];
            $price        = $row['price'];
        }
    }else{
        echo "Aucun produit trouver";
    }
 }else if(isset($_GET['name_service'])=='events'){
     //2. CAS D'EVENNEMENTS
    $userConnected = $_SESSION['email'];
    $SqlEcom = "SELECT * from events INNER JOIN users ON users.id = events.user_id WHERE email = '{$userConnected}'";
    $execute = mysqli_query($connect,$SqlEcom);
    $Rowcount = mysqli_num_rows($execute);
    if($Rowcount > 0){
        while($row = mysqli_fetch_assoc($execute)){
            $name_events = $row['name_events'];
            $proprieter  = $row['proprieter_name'];
            $desc_events = $row['desc_events'];
            $type        = $row['type'];
            $adress      = $row['adress'];
        }
    }else{
        echo "Aucun evenement trouver";
    }
 
 }

  if(isset($_GET['name_service'])=='billets'){
    //3. CAS D'ACHAT ET RESERVATION DES BILLETS
    $userConnected = $_SESSION['email'];
    $SqlEcom = "SELECT * from billets INNER JOIN users ON users.id = billets.user_id WHERE email = '{$userConnected}'";
    $execute = mysqli_query($connect,$SqlEcom);
    $Rowcount = mysqli_num_rows($execute);
    if($Rowcount > 0){
        while($row = mysqli_fetch_assoc($execute)){
            $name_billets = $row['name_billets'];
            $desc_billets = $row['desc_billets'];
            $price        = $row['price'];
            $adress       = $row['adress'];
        }
    }else{
        echo "Aucun billet trouver";
    }
  }
?>