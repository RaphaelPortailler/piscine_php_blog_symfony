<?php

    // on créer un namespace qui permet d'identifier le chemin afin d'utiliser la class actuelle
namespace App\Controller;

    // on appelle le chemin(namespace) des classe utilisé et symfony fera le require de ces class
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

    // on étend la classe AbstractController qui permet d'utiliser des fonctions utilitaires pour les controllers (twig etc)
class IndexController extends AbstractController
{
    // annotation
    // permet de créer une route c'est a dire une nouvelle page sur notre appli quand l'url est appelé
    // ça éxécute automatiquement la méthode définit sous la route
    #[Route('/', 'home')]
public function index()
    {
        var_dump('Hello world'); die;
    }
}