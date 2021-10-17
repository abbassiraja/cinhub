<?php

namespace App\Controller;

use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/reserver", name="show")
     */
    public function index(Request $request): Response
    {
        $user = new User;
        $form = $this->createForm(ReservationType::class, $user);
        $form ->handleRequest($request);

      
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $this->render('show/reservation.html.twig',  [
            'form' => $form->createView(),
            
        ]);
    }
}
