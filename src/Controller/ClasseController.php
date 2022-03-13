<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use App\Repository\EnseignantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/classe")
 */
class ClasseController extends AbstractController
{
    /**
     * @Route("/", name="classe_index", methods={"GET"})
     */
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('classe/index.html.twig', [
            'classes' => $classeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/Ajouter-classe", name="classe_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EnseignantRepository $enseignantRepository): Response
    {
        $classe = new Classe();
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $enseignant = $enseignantRepository->findOneById($this->getUser()->getId());
            $classe->setEnseignant($enseignant);
            $entityManager->persist($classe);
            $entityManager->flush();

            return $this->redirectToRoute('enseignant_seance');
        }

        return $this->renderForm('classe/new.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="classe_show", methods={"GET"})
     */
    public function show(Classe $classe): Response
    {
        return $this->render('classe/show.html.twig', [
            'classe' => $classe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="classe_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Classe $classe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClasseType::class, $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classe/edit.html.twig', [
            'classe' => $classe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="classe_delete", methods={"POST"})
     */
    public function delete(Request $request, Classe $classe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($classe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
