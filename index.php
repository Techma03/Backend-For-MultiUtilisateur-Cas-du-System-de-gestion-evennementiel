<?php 
// Un script qui te donne la possibilite de faire 
// du ecormmece, gerer tout vos evenements et de faire 
// de reservation et achat de billets

//1. Organiser les type d'activité
 include_once "./config/connect.php";
 session_start();
 $ecommerce = "commerces";
 $events    = "evenements";
 $billets   = "billets";
 
 //Verifier si l'itulisateur est connecter.
 if(isset($_SESSION['email'])){
    $all_services ="SELECT * FROM services";
    $execute = mysqli_query($connect,$all_services);
    $Rowcount = mysqli_num_rows($execute);
    if($Rowcount > 0){
        while($row = mysqli_fetch_assoc($execute)){
            $userConnected = $_SESSION['email'];
            $id = $row['id'];
            $name_service = $row["name_service"];
            echo '<a href=details-service?id='.$id.'&&user='.$userConnected.'&&name_service='.$name_service.'>'.$name_service.'</a>';
        }
    }else{
        echo "Aucun Service Trouvé";
    }
    
 }else{
    header("location:login.php");
 }



?>