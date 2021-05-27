<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Books;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BooksController extends AbstractController
{
    /**
     * @Route("/api/books/show/{id}", name="get_book_by_id")
     */
    public function show($id)
    {
        $book = $this->getDoctrine()
            ->getRepository(Books::class)
            ->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'Invalid ID'
            );
        }

        $data = [];
        $data['id'] = $book->getId();
        $data['title'] = $book->getBookName();
        $data['isbn'] = $book->getIsbn();
        $data['price'] = $book->getPrice();
        $data['qty'] = $book->getQty();
        $data['author'] = $book->getAuthor();
        $data['category'] = $book->getCategory()->getCategoryName();

        return new JsonResponse($data);
    }

    /**
     * @Route("/api/books/list", name="list_books_by_category")
     */

    public function listBooksByCategory(Request $request)
    {
        $cata = (int) $request->query->get("category");
        $page = (int) $request->query->get("page");

        
        if(!is_int($cata) || $cata < 1){
            return new JsonResponse('Invalid Category ID');
        }
        
        if(!is_int($page) || $page < 1){
            $page = 1;
        }

        $data = $this->getDoctrine()->getRepository(Books::class)->findBooksByCategoryId($cata, $page);
        $response = [];
        foreach($data as $k){
            $res = [];
            $res['id'] = $k->getId();
            $res['title'] = $k->getBookName();
            $res['isbn'] = $k->getIsbn();
            $res['price'] = $k->getPrice();
            $res['qty'] = $k->getQty();
            $res['author'] = $k->getAuthor();
            $res['category'] = $k->getCategory()->getCategoryName();

            $response[] = $res;
        }

        return new JsonResponse($response);

    }

}
