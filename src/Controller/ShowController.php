<?php

namespace App\Controller;

use App\Entity\Film;
use DateTimeImmutable;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function index(Film $film, Request $request, EntityManagerInterface  $manager): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
 
        $form->handleRequest($request);
 
        if($form->isSubmitted() && $form->isValid()){
            $commentaire->setDate(new \DateTimeImmutable())
                     ->setFilm($film);
 
            $manager->persist($commentaire);
            $manager->flush();
 
            return $this->redirectToRoute('show', ['id' => $film->getId()]);
        }
 

        return $this->render('show/index.html.twig', [
            'film' => $film,
            'commentaireForm' => $form->createView(),
        ]);
    }
}
