<!-- Pagina inicial-->
<?php
  session_start();
  $msg_log=$_SESSION["msg_log"] ;
  unset($_SESSION["msg_log"] );

  $msg_inpatient=$_SESSION["msg_inpatient"] ;
  unset($_SESSION["msg_inpatient"] );

  $msg=$_SESSION["msg"] ;
  unset($_SESSION["msg"] );

  require_once('config/init.php');
  require_once('database/department.php');
  
  try{
    $result = getListDepartments(); // array of arrays
  } catch(PDOException $e){
    $err = $e-> getMessage();
    exit(0);
  }
?>

<?php

  include('templates/header.php');
  include('templates/home_page.php'); // content
  include('templates/script_slides.php');
  include('templates/footer.php');

?>

