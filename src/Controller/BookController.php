<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book")
     */
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

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






    /**@Route ("/book/{id}", methods={GET}, name="read_book")
     * @return Response
     */
    public function readOne(int $id): Response
    {
        $repo = $this->getDoctrine()->getRepository(BookRepository::class);
        $book = $repo->find($id);
    }
}
