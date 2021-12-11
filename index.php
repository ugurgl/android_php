<!DOCTYPE HTML>  
<html>
<head>
<style>
.error 
{
  color: #FF0000;
  }
</style>
</head>
<body>  

<?php

$yemekErr = $siteErr = $websiteErr = $tarifErr = "";
$yemek = $tarif = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["yemek"])) {
    $yemekErr = "Yemek girilmelidir";
  } else {
    $yemek = test_input($_POST["yemek"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$yemek)) {
      $yemekErr = "*";
    }
  }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Link Giriniz";
    }
  }

  if (empty($_POST["tarif"])) {
    $tarif = "";
  } else {
    $tarif = test_input($_POST["tarif"]);
  }



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Yemek Listesi</h2>
<p><span class="error">* Yıldızlı Bölgeler Gereklidir</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Yemek: <input type="text" name="yemek" value="<?php echo $yemek;?>">
  <span class="error">* <?php echo $yemekErr;?></span>
  <br><br>
  Tarif: <textarea name="tarif" rows="5" cols="40"><?php echo $tarif;?></textarea>
  <br><br>
  Site: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Gönder"> 
   
</form>

<?php
echo "<h2>Liste:</h2>";
echo $yemek;
echo "<br>";
echo $tarif;
echo "<br>";
echo $website;
echo "<br>";
?>

</body>
</html>