<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
       <form action="offres_traitement.php" method="post">
         <div class="form-group">
           <a>Nous avons besoin de votre numéro de téléphone pour l'installation. L'installateur Takecare vous appellera à la suite de votre abonnement pour fixer un rdv d'installation de l'antivol automobile</a>
           <input type="tel" name="telephone" class="form-control" placeholder="telephone" required="required" autocomplete="off" maxlength="10" minlength="10">
           </div>
           <div class="form-group">
             <label for="pet-select">marque du véhicule:</label>


  <select name="" id="pet-select">
      <option value="">--Sélectionner votre véhicule--</option>

      <?php
      $bdd = new PDO("mysql:host=localhost;dbname=car2db", "root", "");
      $bdd->exec("SET CHARACTER SET utf8");
      $a = $bdd->prepare('SELECT name FROM car_make');
       $a->execute();
      $result = $a->fetchall();

      foreach ($result as $element){
        echo "<option value=".$element["name"].">".$element["name"]."</option>";
      }
?>

  </select>
           </div>
           <div class="form-group">
             <label for="pet-select">modele du véhicule:</label>
  <select name="" id="pet-select">
      <option value="">--Sélectionner votre modèle--</option>

      <?php
      $b = $bdd->prepare('SELECT name FROM car_model');
       $b->execute();
      $resultat = $b->fetchall();

      foreach ($resultat as $element){
        echo "<option value=".$element["name"].">".$element["name"]."</option>";
      }
?>
  </select>
           </div>
           <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">envoyer</button>
           </div>
       </form>
       <style>
       label,
       footer {
         font-family: sans-serif;
       }

       label {
         font-size: 1rem;
         padding-right: 10px;
       }

       select {
         font-size: .9rem;
         padding: 2px 5px;
       }

       footer {
         font-size: .8rem;
         position: absolute;
         bottom: 30px;
         left: 30px;
       }
       </style>
  </body>
</html>
