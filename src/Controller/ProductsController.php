<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends AbstractController
{

    private array $products;

        function __construct()
        {
            $this->products = [
                [
                    'id' => 1,
                    'title' => 'Playstation 5',
                    'price' => 499.99,
                    'price_reduction' => 0,
                    'image' => 'img/ps5.jpg',
                    'categories' => ['console', 'sony']
                ],
                [
                    'id' => 2,
                    'title' => 'Xbox Series X',
                    'price' => 499.99,
                    'price_reduction' => 0,
                    'image' => 'img/xboxX',
                    'categories' => ['console', 'microsoft']
                ],
                [
                    'id' => 3,
                    'title' => 'Nintendo Switch',
                    'price' => 299.99,
                    'price_reduction' => 0,
                    'image' => 'img/switch.jpg',
                    'categories' => ['console', 'nintendo']
                ],
                [
                    'id' => 4,
                    'title' => 'Playstation 4',
                    'price' => 299.99,
                    'price_reduction' => 199.99,
                    'image' => 'img/ps4-product-thumbnail-01-en-14sep21.webp',
                    'categories' => ['console', 'sony']
                ],
                [
                    'id' => 5,
                    'title' => 'Xbox One',
                    'price' => 299.99,
                    'price_reduction' => 199.99,
                    'image' => 'img/xboxO.png',
                    'categories' => ['console', 'microsoft']
                ],
            ];
        }

    #[Route('/products', name: 'list_products')]
    public function listProducts(): Response
    {
        $html = $this->renderView('page/products.html.twig', [
            'products' => $this->products
        ]);
        return new Response($html, 200);
    }

    #[Route('/show-product/{id}', name: 'show_product')]
    public function showProduct($id):Response
    {
        $productFound = null;

        foreach ($this->products as $products) {
            if($products['id'] === (int)$id) {
                $productFound = $products;
            }
        }

        return $this->render('page/showProduct.html.twig', [
            'product' => $productFound
        ]);
    }

}