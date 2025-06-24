<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$db = 'tmdb_filmes';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Não foi possível conectar! " . $e->getMessage());
}