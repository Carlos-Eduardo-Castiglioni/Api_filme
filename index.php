<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controller/filmeController.php';

$controller = new FilmeController();

try {
    
    $controller->buscarFilmesPopulares();
    
    
    $filmes = $controller->listarFilmes();
} catch (Exception $e) {
    $error = $e->getMessage();
}

require_once __DIR__ . '/view/filmes.php';