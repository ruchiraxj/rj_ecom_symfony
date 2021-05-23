<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/list", name="get_category_list")
     */
    public function list()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        
        $data = [];
        foreach($categories as $k){
            $data[] = [
                "id" => $k->getId(),
                "title" => $k->getCategoryName()
            ];
        }

        return new JsonResponse($data);

    }
}
