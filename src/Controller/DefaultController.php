<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/index')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->error('We are logging!');

        return $this->render('base.html.twig');
    }
}
