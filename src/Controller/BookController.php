<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{

    /**
     * @Route ("/create-book", name="create_book")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        }
        return $this->render("Book/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route ("/book/{id}", methods={"GET"}, name="read_book")
     * @param int $id
     * @return Response
     */
    public function readOne(int $id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Book::class);
        $book = $repo->find($id);
        dump($book);
        return $this->render('book/book.html.twig', [
            'book' => $book

        ]);
    }

    /**
     * @Route ("/update-book/{id}", name="update_book")
     * @param Request $request
     * @return Response
     */
    public function update(Book $book, Request $request): Response
    {

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        }
        return $this->render("Book/create.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
