<?php

declare(strict_types=1);

    // on créer un namespace qui permet d'identifier le chemin afin d'utiliser la class actuelle
namespace App\Controller;

    // on appelle le chemin(namespace) des classe utilisé et symfony fera le require de ces class
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    // on étend la class AbstractController qui permet d'utiliser des fonctions utilitaires pour les
    // controllers (twig etc)
class IndexController extends AbstractController
{
    // #[Route est une annotation qui permet de créer une route, c'est a dire une nouvelle page sur notre appli quand
    // l'url est appelé et ça éxécute automatiquement la méthode définit sous la route
    #[Route('/', 'home')]
public function index()
    {

        $request = Request::createFromGlobals();
        $maxPrice = $request->query->get('maxPrice');

        if($request->query->has('city')){
            $city = $request->query->get('city');
        }

        return $this->render('page/index.html.twig');
    }
}