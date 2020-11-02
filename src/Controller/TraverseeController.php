<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TraverseeController extends AbstractController
{
    /**
     * @Route("/traversee", name="traversee")
     */
    public function index(): Response
    {
        return $this->render('traversee/index.html.twig', [
            'controller_name' => 'TraverseeController',
        ]);
    }
}
