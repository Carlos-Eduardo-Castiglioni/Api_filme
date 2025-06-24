<?php
require_once __DIR__ . '/../config/config.php';

class FilmeModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function salvarFilme($titulo, $descricao, $poster) {
        try {
            $sql = "INSERT INTO filmes (titulo, descricao, poster) VALUES (:titulo, :descricao, :poster)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':poster', $poster);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao salvar filme: " . $e->getMessage());
            return false;
        }
    }

    public function listarFilmes() {
        try {
            $sql = "SELECT * FROM filmes";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erro ao listar filmes: " . $e->getMessage());
            return [];
        }
    }
}
