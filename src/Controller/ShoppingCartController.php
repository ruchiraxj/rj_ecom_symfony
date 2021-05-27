<?php

namespace App\Controller;

use App\Service\ShoppingCart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;

class ShoppingCartController extends AbstractController
{   
     /**
     * @Route("/cart/get", name="get_cart_items")
     */
    public function show(Request $request, ShoppingCart $cart)
    {
        
        try{
            $data = $cart->getCartData();
            return new JsonResponse($data);
        }catch(Exception $e){
            return new JsonResponse($e->getMessage(), $e->getCode());
        }

    }

    /**
     * @Route("/cart/add", name="add_item_to_cart")
     */
    public function add(Request $request, ShoppingCart $cart)
    {
        $id = $request->request->get("id");
        if($id == ""){
            return new JsonResponse("Invalid Request", 400);
        }
        try{
            $data = $cart->addToCart($id);
            return new JsonResponse($data);

        }catch(Exception $e){
            return new JsonResponse($e->getMessage(), $e->getCode());
        }

    }

}
