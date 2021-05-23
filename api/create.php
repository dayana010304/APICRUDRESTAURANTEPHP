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
$item = new plato($db);


$item->Nombre = $_GET['Nombre'];
$item->Descripcion = $_GET['Descripcion'];
$item->Precio = $_GET['Precio'];
$item->Creado = date('Y-m-d H:i:s');
if ($item->createPlato()) { // return true
    echo 'Employee created successfully.';
} else { // return false
    echo 'Employee could not be created.';
}

