<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{


    /**
     * @Route ("/book/{id}", methods={"GET"}, name="read_book")
     * @param int $id
     * @return Response
     */
    public function readOne(int $id): Response
    {
        $repoBook = $this->getDoctrine()->getRepository(Book::class);
        $book = $repoBook->find($id);

        return $this->render('book/book.html.twig', [
            'book' => $book,
        ]);
    }


    /**
     * @Route("/update-book/{id}/{userUn}")
     * @param EntityManagerInterface $em
     * @param BookRepository $bookRepository
     * @param int $id
     * @param string $userUn
     * @return Response
     */
    public function updateBorrowerId(EntityManagerInterface $em, BookRepository $bookRepository, int $id, string $userUn): Response
    {

        $book = $bookRepository->findOneByid($id);
        $book->setBorrower($userUn);
        $book->setAvailability(2);
        $em->flush();

        return $this->render('book/book.html.twig', [
            'book' => $book,
        ]);
        //return new Response('book/book.html.twig');
    }

}
