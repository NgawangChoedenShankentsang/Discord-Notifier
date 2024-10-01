<?php
// src/Controller/CheckoutController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Routing\Attribute\Route;

class NotifyController extends AbstractController
{
    #[Route('/notify', name: 'notify')]
    public function thankyou(ChatterInterface $chatter): Response
    {
        // Create a new chat message
        $message = new ChatMessage('Hello, this is a notification from Symfony!');

        // Explicitly specify the Discord transport
        $message->transport('discord');

        // Send the message
        $chatter->send($message);

        // Return a response to the user
        return new Response('Check it out! A message has been sent to your Discord.');
    }
}
