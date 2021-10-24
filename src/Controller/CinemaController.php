<?php

namespace App\Controller;

use App\Entity\Cinema;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CinemaController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }

    /**
     * @Route("/cinema", name="cinema")
     */
    public function index(): Response
    {
        $cinema = $this->entityManager->getRepository(Cinema::class)->findAll();
        return $this->render('cinema/index.html.twig', [
            'cinema'=>$cinema,
            
        ]);
    }
}
