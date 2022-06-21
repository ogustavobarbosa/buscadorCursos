<?php

require 'vendor/autoload.php';


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;

$client = new Client([
    'verify' => false,
    'base_uri'=> 'https://www.alura.com.br/'
]);
$crowler = new Crawler();

$buscador = new Buscador($client, $crowler);

$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso){
    echo $curso. PHP_EOL;
}




