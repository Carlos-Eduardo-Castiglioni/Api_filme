<?php
require_once __DIR__ . '/../model/filmeModel.php';

class FilmeController {
    private $model;

    public function __construct() {
        $this->model = new FilmeModel();
    }

    public function buscarFilmesPopulares() {
        $api_key = 'cbe5445a31a968d29e83c342d7a0bcd1';
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=pt-BR";

        $response = file_get_contents($url);
        if ($response === false) {
            throw new Exception("Falha ao acessar a API TMDB");
        }

        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
        }

        foreach ($data['results'] as $filme) {
            $titulo = $filme['title'];
            $descricao = $filme['overview'];
            $poster = "https://image.tmdb.org/t/p/w500" . $filme['poster_path'];
            
            $this->model->salvarFilme($titulo, $descricao, $poster);
        }

        return $this->model->listarFilmes();
    }

    public function listarFilmes() {
        return $this->model->listarFilmes();
    }
}