<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/mail", name="mail")
     * @param MailerInterface $mailer
     * @throws TransportExceptionInterface
     */
    public function index(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('gaelmayer@yahoo.fr')
            ->to('gaelmayer90@gmail.com')
            ->subject('Validation de votre compte')
            ->text('Votre compte à bien été validé');
        $mailer->send($email);

    }
}
