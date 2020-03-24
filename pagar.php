<!doctype html>
<html>
  <head>
    <title>Pagar</title>

  </head>
  <body>

  <?php
// SDK de Mercado Pago
require_once 'vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398');

// Crea un objeto de preferencia
//$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = $_POST['title'];
$item->quantity = 1;
$item->unit_price = $_POST['price'];
$preference->items = array($item);
$preference->save();
?>

<form action="/procesar-pago" method="POST">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>

    <a href="<?php echo $preference->init_point; ?>">Pagar con Mercado Pago</a>
  </body>
</html>
