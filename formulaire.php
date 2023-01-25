<?php
if(isset($_POST['resp'])){
    switch($_POST['resp']){
        case "Acheter" : header('location: http://www.google.com/');
            break;
        case "Vendre" : header('location: http://www.google.com/');
            break;
        case "Louer" : header('location: http://www.google.com/');
            break;
    };
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
  <form method="post" action="">
    <fieldset>
      <label>Prix HT</label>
      <input
              type="number"
              name="prixht"
              id="prixht"
              step="0.01"
              value="<?=isset($_POST["prixht"]) ? $_POST['prixht'] : ""?>"
      >
      <label>€</label>
        <?php
        if(isset($_POST['prixht'])&& empty($_POST['prixht'])){
            echo "Merci de saisir un montant";
        }
        ?>
      </br>
      </br>
      <label>Taux TVA</label>
        <select name="tva" id="tva">
            <?php
                $liste = [20,19.6,5.5];
                foreach ($liste as $element){
                    $_POST["tva"] === $element ? $sel = "selected" : "";
                    echo "<option value=$element $sel>$element</option>";
                }
            ?>
        </select>
      <label>%</label>
        </br>
        </br>
      <input type="submit" value="Calculer">
      </br>
      <?php
      $filtreMDP = array(
          'filter' => FILTER_VALIDATE_FLOAT,
          'options' => array('regexp' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$#'));
      if(isset($_POST['tva'],$_POST['prixht'])&& !empty($_POST['prixht'])){
            $tva = filter_input(INPUT_POST,'tva', FILTER_VALIDATE_FLOAT);
            $prixht = filter_input(INPUT_POST,'prixht', FILTER_VALIDATE_FLOAT);
            $prixTTC = $prixht * (1+$tva/100);
            echo"</br>";
            echo "<p>Montant de la TVA: $tva %</p>";
            echo "</br>";
            echo '<label>Montant ttc  </label>';
            echo $prixTTC . "€";;
        }
      ?>
    </fieldset>
  </form>
   <form method="post" action="">
       <fieldset>
           <legend>Vous souhaitez...</legend>
           <input type="submit" name="resp" id="Acheter" value="Acheter">
           <input type="submit" name="resp" id="Vendre" value="Vendre">
           <input type="submit" name="resp" id="Louer" value="Louer">
       </fieldset>
   </form>
</body>
</html>