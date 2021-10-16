<?php

namespace App\Controller;


use DateTime;
use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    private $entityManager;

public function __construct(EntityManagerInterface $entityManager) {

    $this->entityManager = $entityManager;

   

}

    /**
     * @Route("/film", name="film")
     */
    public function index(): Response
    {
        $film = $this->entityManager->getRepository(Film::class)->findAll();
        return $this->render('film/index.html.twig',[
            
            'film' => $film
        ]);
    }
}
