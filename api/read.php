<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../platos.php';
$database = new Database();

$db = $database->getConnection();
$items = new Plato($db);
$records = $items->getPlatos();
$itemCount = $records->num_rows;

if ($itemCount > 0) {
    $platoArr = array();
    $platoArr["body"] = array();

    while ($row = $records->fetch_assoc()) {
        array_push($platoArr["body"], $row);
    }
    echo json_encode($platoArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
