<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Borrower;
use App\Form\BorrowerType;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class BorrowerController extends AbstractController
{
    /**
     * @Route("/borrower", name="borrower")

     * @return Response
     */
       public function profil(): Response
       {


           $repo = $this->getDoctrine()->getRepository(Book::class);
           $books = $repo->findAll();
           return $this->render('Borrower/profil.html.twig', [
               "books" => $books,
               'controller_name' => 'BorrowerController',
           ]);
       }

    /**
     * @Route ("/create-borrower", name="create_borrower")
     * @param Request $request
     * @param UserPasswordHasherInterface $passwordHasher
     * @return Response
     */
       public function register(Request $request, UserPasswordHasherInterface $passwordHasher)
       {
           // Construction du formulaire
           $borrower = new Borrower();
           $form = $this->createForm(BorrowerType::class, $borrower);

           $form->handleRequest($request);
           if ($form->isSubmitted() && $form->isValid()) {

               $password = $passwordHasher->hashPassword($borrower, $borrower->getPassword());
               $borrower->setPassword($password);

               $em = $this->getDoctrine()->getManager();
               $em->persist($borrower);
               $em->flush();

           }
           return $this->render("Borrower/create.html.twig", [
               "form" => $form->createView()]);
       }


}
