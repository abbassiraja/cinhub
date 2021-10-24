<?php

namespace App\Controller;


use App\Entity\Film;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(Request $request): Response
    {
        
        $form = $this->createForm(ReservationType::class);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $reservation = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $this->entityManager->persist($reservation);
            $this->entityManager->flush();
        }

       
        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $form->createView(),
        ]);
    }
}
