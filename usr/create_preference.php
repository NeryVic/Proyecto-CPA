<?php
require __DIR__ . '../vendor/autoload.php';

// Configurar credenciales de Mercado Pago
MercadoPago\SDK::setAccessToken('YOUR_ACCESS_TOKEN');

// Obtener el plan seleccionado desde el frontend
$plan = $_POST['plan'];

switch ($plan) {
    case '1mes':
        $title = 'Plan 1 Mes';
        $price = 5.0;
        break;
    case '3meses':
        $title = 'Plan 3 Meses';
        $price = 10.0;
        break;
    case '6meses':
        $title = 'Plan 6 Meses';
        $price = 29.0;
        break;
    default:
        echo json_encode(array('error' => 'Plan no válido'));
        exit;
}

// Crear una preferencia de pago
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = $title;
$item->quantity = 1;
$item->unit_price = $price;
$preference->items = array($item);

$preference->back_urls = array(
    "success" => "https://www.tusitio.com/success",
    "failure" => "https://www.tusitio.com/failure",
    "pending" => "https://www.tusitio.com/pending"
);
$preference->auto_return = "approved";

$preference->save();

echo json_encode(array('init_point' => $preference->init_point));
?>
