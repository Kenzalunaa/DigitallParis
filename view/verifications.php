<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
<!--- CSS de la page charger avec ces liens --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
<!--- Formulairee pour connaitre la voiture du client --->
       <form action="../traitements/offres_traitement.php" method="post">
         <div class="form-group">
           <a>Nous avons besoin de votre numéro de téléphone pour l'installation. L'installateur Takecare vous appellera à la suite de votre abonnement pour fixer un rdv d'installation de l'antivol automobile</a>
           <input type="tel" name="telephone" class="form-control" placeholder="telephone" required="required" autocomplete="off" maxlength="10" minlength="10">
           </div>
           <div class="form-group">
             <label for="pet-select">marque du véhicule:</label>


  <select name="" id="pet-select">
      <option value="">--Sélectionner votre véhicule--</option>

      <?php
      $bdd = new PDO("mysql:host=localhost;dbname=car2db", "root", ""); //Connexion à la BDD (base de données de Care2db)
      $bdd->exec("SET CHARACTER SET utf8"); //Execution de l'UTF8 sur la liste déroulante
      $a = $bdd->prepare('SELECT name FROM car_make'); //On sélectionne le nom des marques de voitures
       $a->execute();
      $result = $a->fetchall(); //On affiche tout

      foreach ($result as $element){ //Et on parcour
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
      $b = $bdd->prepare('SELECT name FROM car_model'); //On sélectionne le nom des models de voitures
       $b->execute();
      $resultat = $b->fetchall(); //On affiche tout

      foreach ($resultat as $element){ //Et on parcours
        echo "<option value=".$element["name"].">".$element["name"]."</option>";
      }
?>
  </select>
           </div>
           <div class="form-group">
<!--- button d'envoie des informations Sélectionner --->
               <button type="submit" class="btn btn-primary btn-block">envoyer</button>
           </div>
       </form>
<!--- CSS --->
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
