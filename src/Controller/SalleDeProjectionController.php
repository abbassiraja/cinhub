<?php

namespace App\Controller;

use App\Entity\SalleDeProjection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleDeProjectionController extends AbstractController
{  private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }
    /**
     * @Route("/salle/de/projection", name="salle_de_projection")
     */
    public function index(): Response
    {
        $salledeprojection = $this->entityManager->getRepository(SalleDeProjection::class)->findAll();
        return $this->render('salle_de_projection/index.html.twig', [
            'salledeprojection' => $salledeprojection
        ]);
    }
}
