
<?php

require 'db_connect.php';

if(isset($_REQUEST['vendi'])) {

    $finalPrice=$_GET['finalPrice'];

    $query1="SELECT * FROM carrello WHERE email='".$_SESSION['email']."'";
    $result1 = mysqli_query($conn,$query1);

    while($array1=$result1->fetch_assoc()) {

        $idUtente = $array1['idUtente'];
        //$idCarrello = $array1['idCarrello'];

        $query2="INSERT INTO vendite (idUtente,totale) VALUES ('$idUtente','$finalPrice') ON DUPLICATE KEY UPDATE idUtente = '$idUtente' , totale = '$finalPrice'";
        $result2 = mysqli_query($conn,$query2);

        //$result2 = $conn->query($query2) or die($conn->error);

        //while($array2=$result2->fetch_assoc()) {

            $query3="DELETE FROM carrello WHERE email='".$_SESSION['email']."'";
            $result3 = mysqli_query($conn,$query3);

           header("location: confAcquisto.php");
           //echo("fatto tutto");
       // }
    }

    if(!$result1){
        die('Insert vendite non riuscita' .mysqli_error($conn));
      }

    if(!$result2){
        die('delete non riuscita' .mysqli_error($conn));
      }

}

?>