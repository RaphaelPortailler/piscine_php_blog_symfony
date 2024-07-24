<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends AbstractController{

    #[Route('/categories', name: 'list_categories')]
    public function listCategories(){
        $categories = [
            'Red',
            'Green',
            'Blue',
            'Yellow',
            'Gold',
            'Silver',
            'Crystal'
        ];

        $html = $this->renderView('page/categories.html.twig', [
            'categories' => $categories
        ]);
        return new Response($html, 200);
    }
}