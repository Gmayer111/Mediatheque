<?php


namespace App\Controller;


use http\Env\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController
{

    /**
     * @Route ('/mail')
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(MailerInterface $mailer):Response
    {
        $email = (new Email())
            ->from('from@example.com')
            ->to('gaelmayer@yahoo.fr')
            ->subject('This email is for testing purpose')
            ->text('This is the text version')
            ->html('<p>This is the HTML version</p>');

        $mailer->send($email);

        return new Response();
    }
}