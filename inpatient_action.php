<?php
    session_start();
    require_once('config/init.php');
    require_once('database/inpatient.php');
    

    // $funtion=$_POST["funtion"]
    $code=$_POST["code"];


    // #verify if is There is a Inpatient with this Code
    // function IsThatAInpatient($code){
    //     global $dbh;
    //     $stmt=$dbh->prepare("SELECT Inpatient.code FROM Inpatient 
    //                          JOIN Patient ON Inpatient.patient=Patient.cc
    //                          WHERE Inpatient.code=?");
    //     $stmt->execute(array($code));
    //     return $stmt->fetch();
    // }
    
    if(IsThatAInpatient($code)){
        header('Location: inpatient_pag.php');
    }
    else{
        $_SESSION["msg"]="Something goes wrong :(. There is no such Inpatient";
    }
    

?>
  