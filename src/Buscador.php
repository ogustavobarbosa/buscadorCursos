<?php

namespace Alura\BuscadorDeCursos;

use Symfony\Component\DomCrawler\Crawler;

use GuzzleHttp\ClientInterface;


class Buscador{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler){
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;

    }
    public function buscar(string $url): array{
        $resposta = $this->httpClient->request('get',$url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $cursosElementos = $this->crawler->filter('.card-curso__nome');

        $cursos = [];
        
        foreach ($cursosElementos as $elemento){
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }

}