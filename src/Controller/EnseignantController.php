<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant", name="enseignant")
     */
    public function index(): Response
    {
        return $this->render('enseignant/index.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }

    /**
     * @Route("/enseignant/seance", name="enseignant")
     */
    public function seance(): Response
    {
        return $this->render('enseignant/index_seance.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }
}
