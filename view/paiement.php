<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<!-- On raffraichi la page après 5 seconde pour passer à la suivante -->
    <meta http-equiv="refresh" content="5 ; url=verifications.php">
  </body>
</html>
    <?php
  require_once('../stripe-php-7.61.0/init.php'); //Librairie de Stripe pour le formulaire de paiement

//Clé secrete API de Stripe (obtenue via le mode test du compte)
\Stripe\Stripe::setApiKey("sk_test_51HHR2GIQqt5dh3sV0DYPhNTPJSZUg2eIp9gMapWGRww55iHHdvVgCqsMWLeiWki1CuYP3wVDhPuhn6ToL8wrIrOj00enJsby6p");

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 1300,
      'currency' => 'eur',
      'description' => 'antivol universel',
      'receipt_email' => $email
  ));

  echo '<h1>Paiement accepter!</h1>';
?>
