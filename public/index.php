<?php

header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *'); // Ou substitua * pelo domínio permitido
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); // Inclua todos os métodos suportados
    header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Inclua todos os cabeçalhos necessários

    // Encerre a execução do script PHP para evitar que o código principal seja executado
    exit;
}

header('Access-Control-Allow-Origin: *');

use src\Helpers\Rota;

header("");

require '../vendor/autoload.php';
require 'rotas.php';

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

$rota->buscar($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
?>

<head>
    <title>TAVERNA DO GORDO - API</title>
</head>