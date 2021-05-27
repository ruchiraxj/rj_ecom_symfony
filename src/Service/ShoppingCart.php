<?php
namespace App\Service;

use App\Entity\Books;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManagerInterface;

class ShoppingCart{
    public $session;
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        //if sessions are not started, create new
        if(session_status() == PHP_SESSION_NONE){
            $this->session = new Session();
            $this->session->start();
            $this->em = $em;
        }

        // $this->session->invalidate();
        // die;

    }

    /**
     * Fetch books by passing book ID
     */
    private function fetchBookInfo($id){
        $book = $this->em->getRepository(Books::class)->find($id);
        if(!$book){
            throw new Exception("Invalid Product ID", 422);
        }

        $data = [];
        $data['id'] = $book->getId();
        $data['title'] = $book->getBookName();
        $data['isbn'] = $book->getIsbn();
        $data['price'] = $book->getPrice();
        $data['total'] = $book->getPrice();
        $data['qty'] = $book->getQty();
        $data['author'] = $book->getAuthor();
        $data['category'] = $book->getCategory()->getCategoryName();
        $data['categoryId'] = $book->getCategoryId();
        return $data;

    }

    /**
     * Get cart summery by passing the cart items
     */
    private function getCartSum($data){
        $response = [
            "subTotal" => 0,
            "discount" => 0,
            "total" => 0
        ];

        if(count($data) < 1){
            return $response;
        }

        $qts = [];
        foreach($data as $k){
            $response['subTotal'] += $k['total'];

            if(!isset($qts[$k['categoryId']])){
                $qts[$k['categoryId']] = ['qty' => 0, 'tot' => 0];
            }
            $qts[$k['categoryId']]['qty'] += $k['qty'];
            $qts[$k['categoryId']]['tot'] += $k['total'];

        }

        
        if(@$qts[1]['qty'] >= 5){
            $response['discount'] += ($qts[1]['tot'] * 0.1);
        }

        if(@$qts[1]['qty'] >= 10 && @$qts[2]['qty'] >= 10){
            $response['discount'] += ($response['subTotal'] * 0.05);
        }

        $response['total'] = number_format(($response['subTotal'] - $response['discount']), 2);
        $response['discount'] = number_format($response['discount'], 2);
        $response['subTotal'] = number_format($response['subTotal'], 2);


        return $response;
    }


    /**
     * Add a book to the cart
     * 
     * @param Integer $id Book Id
     * 
     * @return Array Books in the cart
     * 
     */
    public function addToCart($id){
        $book = $this->fetchBookInfo($id);
        
        //get the cart items for the user session
        $cartItems = $this->getCartData();
        $items = $cartItems['items'];
        
        //check if book is already exists in the cart
        //if book exists in the cart update qty and total
        $trueQty = 0;
        foreach($items as $kk => $k){
            if($k['id'] === $book['id']){
                if($k['qty'] > $book['qty']){
                    throw new Exception('Only '.$book['qty'] .' Book/s avaialble : '.$book['title'], 400);
                }
                $trueQty = $k['qty'] + 1;
                $items[$kk]['qty'] = $trueQty;
                $items[$kk]['total'] = ($book['price'] * $trueQty);
            }
        }

        //if book is not available in the cart add the book
        if($trueQty == 0){
            $newBook = $book;
            $newBook['qty'] = 1;
            $items[] = $newBook;
        }
        
        //update cart items 
        $cartItems['items'] = $items;

        //revalidate the sum
        $cartItems['sum'] = $this->getCartSum($items);
        

        //push data to session
        $this->session->set("cart_items", $cartItems);
        return $cartItems;
    }


    public function deleteFromCart($id){
        $book = $this->fetchBookInfo($id);
        
        //get the cart items for the user session
        $cartItems = $this->getCartData();
        $items = $cartItems['items'];

        //check if book is already exists in the cart
        //if book exists in the cart update qty and total
        $newArray = [];
        foreach($items as $kk => $k){
            if($k['id'] !== $book['id']){
                $newArray[] = $k;
            }
        }

        //update cart items 
        $cartItems['items'] = $newArray;

        //revalidate the sum
        $cartItems['sum'] = $this->getCartSum($newArray);
        

        //push data to session
        $this->session->set("cart_items", $cartItems);
        return $cartItems;
    }

    
    public function getCartData(){
        return ($this->session->get('cart_items')) ? $this->session->get('cart_items') : ["items" => [], "sum" => []];
    }

}
