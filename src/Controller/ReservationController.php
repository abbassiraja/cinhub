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
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $film = $form->getData();
            $reservation = $this->entityManager->getRepository(Film::class)->findAll();
            $this->entityManager->persist($reservation);
            $this->entityManager->flush();
        }
       
        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $form->createView(),
        ]);
    }
}
