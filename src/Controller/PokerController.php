<?php

declare(strict_types=1);

namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

class PokerController extends AbstractController
{

    #[Route('/', 'home')]
    public function index()
    {

        $request = Request::createFromGlobals();
        $age = $request->query->get('age');

        if(empty($age)) {
            return $this->render('page/index.html.twig');
        } else {
            if($age >= 18)
            {
                return $this->render('page/poker.html.twig');
            } else {
                return $this->render('page/notAge.html.twig');
            }
        }
    }
}