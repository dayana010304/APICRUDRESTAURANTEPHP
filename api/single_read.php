<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../platos.php';

$database = new Database();
$db = $database->getConnection();
$item = new Plato($db);
$item->id = isset($_GET['IdPlato']) ? $_GET['IdPlato'] : die();
$item->getSinglePlato();
if ($item->Nombre != null) {


    $emp_arr = array(
        "IdPlato" => $item->IdPlato,
        "Nombre" => $item->Nombre,
        "Descripcion" => $item->Descripcion,
        "Precio" => $item->Precio,
        "Creado" => $item->Creado
    );

    http_response_code(200);
    echo json_encode($emp_arr);
} else {
    http_response_code(404);
    echo json_encode("Employee not found.");
}
