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
     * @Route("/update-book/{id}/{userid}")
     * @param EntityManagerInterface $em
     * @param BookRepository $bookRepository
     * @param int $id
     * @param int $userid
     * @return Response
     */
    public function updateBorrowerId(EntityManagerInterface $em, BookRepository $bookRepository, int $id, int $userid): Response
    {

        $book = $bookRepository->findOneByid($id);
        dump($id);
        $book->setBorrowerId($userid);
        $book->setAvailability(2);
        $em->flush();

        dump($id);
        return new Response('book/book.html.twig');
    }
}
