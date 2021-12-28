<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("product/{product_id}", name="product")
     */
    public function getProduct($product_id, ManadgerRegistry $managerRegistry ): Response
    {
            $manager = $managerRegistry->getRepositiry(Product::class);
        ]);
    }
}
