<?php
    $dbh = new PDO ('sqlite:sql/hospital_manegment1.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php

  $i=0;
  
/*isto já está noutro ficheiro*/
    function getListDepartments(){
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Department');
        $stmt->execute();
        return $stmt->fetchAll(); // array of arrays
    }
    $result =getListDepartments(); 
  

    function getDoctorInfo($dep_number){
      global $dbh;
      $stmt = $dbh->prepare("SELECT Doctor.name, Doctor.photo, Doctor.phone_number, Doctor.mail_address, Department.name as speciality
                              FROM Doctor JOIN Department ON Doctor.speciality= Department.number 
                              WHERE speciality=?");
  
      $stmt->execute(array($dep_number));
      return $stmt->fetchAll();
  }
    $result2 = getDoctorInfo($dep_number); 
?>

<!DOCTYPE html>
<html lang="en">
  <head >
      <meta meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style_buttons.css" rel="stylesheet">
      <link href="css/layout.css" rel="stylesheet">
      <link href="css/profile.css" rel="stylesheet">

      <link rel="icon" type="imagem/jpg" href="images/Hospital.jpg" />
      <title>Hospital</title>
  </head>

  <body>
      <header id="header_profile">
        <div id="simbolo">
          <h1><a href="index.php">Hospital</a></h1>
          <img src="images/t2.png" alt="" width="30">
        </div>
        <div id="back">
          <h2><a>The best care just a click away!</a></h2>
          <a href="index.php" id="out">Log Out</a>
          
        </div>
      </header> 

      <div class="specialization-select" style="width:200px;">
        <select id="dep">
          <option value="0">--Select Specialization--</option>

          <?php if ($err == null) { ?> 
          <?php foreach ($result as $row) { ?>  
          <option value= "<?php echo $row["number"]?>" > <?php echo $row["name"]?> </option>
          <?php } ?>
          <?php } ?>
            
        </select>
      </div>

      
      <div class="specialization-select" style="width:200px;">
        <select>
          <option value="<?php echo $i ?>" >--Select Doctor--</option>

          <?php $result2 = getDoctorInfo( 5); #ajuda! como achas number do dep
          if ($err == null) { ?> 
          <?php foreach ($result2 as $row2) { 
            $i=$i+1; ?>  
          <option value= "<?php echo $i ?>" > <?php echo $row2["name"]?> </option>
          <?php } ?>
          <?php } ?>
            
        </select>
      </div>


      <!-- agora de acordo com o departamento selecionado, value, selecionar os medicos que aparecem na lista -->


      <!-- Acho que deve ser tudo feito com o php para aceder à base de dados por causa do bloco de tempo e tudo-->

      <!-- CALENDARIO - tentei usar isto mas não funciona como queremos -->
      <!-- Calendly inline widget begin -->
        <!-- <div class="calendly-inline-widget" data-url="https://calendly.com/anafsferreira2/30min?background_color=e3cce3&text_color=ffffff&primary_color=8f6abd" style="min-width:320px;height:630px;"></div>
        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> -->
        <!-- Calendly inline widget end -->
  </body>


</html>