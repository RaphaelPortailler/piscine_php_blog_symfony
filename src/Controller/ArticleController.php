<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    private array $pokemons;

    function __construct(){
        $this->pokemons = [
            [
                'id' => 1,
                'title' => 'Carapuce',
                'content' => 'Pokemon eau',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Salamèche',
                'content' => 'Pokemon feu',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Bulbizarre',
                'content' => 'Pokemon plante',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 4,
                'title' => 'Pikachu',
                'content' => 'Pokemon electrique',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 5,
                'title' => 'Rattata',
                'content' => 'Pokemon normal',
                'isPublished' => false,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 6,
                'title' => 'Roucool',
                'content' => 'Pokemon vol',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 7,
                'title' => 'Aspicot',
                'content' => 'Pokemon insecte',
                'isPublished' => false,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 8,
                'title' => 'Nosferapti',
                'content' => 'Pokemon poison',
                'isPublished' => false,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 9,
                'title' => 'Mewtwo',
                'content' => 'Pokemon psy',
                'isPublished' => true,
                'im' => 'img/1517278976783.jpg'
            ],
            [
                'id' => 10,
                'title' => 'Ronflex',
                'content' => 'Pokemon normal',
                'isPublished' => false,
                'im' => 'img/1517278976783.jpg'
            ]
        ];
    }

    #[Route('/articles', name: 'list_article')]
    public function listArticles()
    {
        //return $this->render('page/article.html.twig', [
        //    'pokemons' => $this->pokemons
        // ]);

        $html = $this->renderView('page/article.html.twig', [
            'pokemons' => $this->pokemons
        ]);
        return new Response($html, 200);
    }


    #[Route('/show-article', name: 'show_article')]
    public function showArticle(Request $request):Response
    {
        // $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        $pokemonFound = null;

        foreach ($this->pokemons as $pokemon) {
            if($pokemon['id'] === (int)$id) {
                $pokemonFound = $pokemon;
            }
        }

        return $this->render('page/showArticle.html.twig', [
            'pokemon' => $pokemonFound
        ]);
        }
}