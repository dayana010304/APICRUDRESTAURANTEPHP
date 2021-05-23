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

$item->IdPlato = isset($_GET['IdPlato']) ? $_GET['IdPlato'] : die();

if ($item->deletePlato()){
    echo json_encode("Plato deleted");
}else{
    echo json_encode("Data could not be deleted");
}