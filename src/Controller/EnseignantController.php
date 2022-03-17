<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/enseignant")
 */
class EnseignantController extends AbstractController
{
    /**
     * @Route("/", name="enseignant")
     */
    public function index(): Response
    {
        return $this->render('enseignant/index.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }

    /**
     * @Route("/seance", name="enseignant_seance")
     */
    public function seance(): Response
    {
        return $this->render('enseignant/index_seance.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }


}
