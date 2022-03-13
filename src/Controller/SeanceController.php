<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Form\SeanceType;
use App\Repository\EnseignantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeanceController extends AbstractController
{
    /**
     * @Route("/seance", name="seance")
     */
    public function index(): Response
    {
        return $this->render('seance/show.html.twig', [
            'controller_name' => 'SeanceController',
        ]);
    }


    /**
     * @Route("/Ajouter-seance", name="seance_new", methods={"GET","POST"})
     */
    public function new(Request $request, EnseignantRepository $enseignantRepository): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $enseignant = $enseignantRepository->findOneById($this->getUser()->getId());
            $seance->setEnseignant($enseignant);
            $entityManager->persist($seance);
            $entityManager->flush();

            return $this->redirectToRoute('enseignant_seance');
        }

        return $this->render('seance/new.html.twig', [
            'seance' => $seance,
            'form' => $form->createView(),
        ]);
    }

}
