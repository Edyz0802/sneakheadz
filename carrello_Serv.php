
<?php

require 'db_connect.php';

if(isset($_REQUEST['vendi'])) {

    $finalPrice=$_GET['finalPrice'];

    $query1="SELECT * FROM carrello WHERE email='".$_SESSION['email']."'";
    $result1 = mysqli_query($conn,$query1);

    while($array1=$result1->fetch_assoc()) {

        $idUtente = $array1['idUtente'];
        $idProdotto = $array1['idProdotto'];
        $taglia = $array1['taglia'];

        $query2="INSERT INTO vendite (idUtente,idProdotto,totale,taglia) 
        VALUES ('$idUtente','$idProdotto','$finalPrice','$taglia') 
        ON DUPLICATE KEY UPDATE idUtente = '$idUtente' , idProdotto = '$idProdotto' , totale = '$finalPrice' , taglia = '$taglia' 
        ";

        $result2 = mysqli_query($conn,$query2);

            $query3="DELETE FROM carrello WHERE email='".$_SESSION['email']."'";
            $result3 = mysqli_query($conn,$query3);

           header("location: confAcquisto.php");
       
    }

    if(!$result1){
        die('Insert vendite non riuscita' .mysqli_error($conn));
      }

    if(!$result2){
        die('delete non riuscita' .mysqli_error($conn));
      }

}

?>