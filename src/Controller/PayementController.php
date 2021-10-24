<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Payement;
use Stripe\Checkout\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PayementController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }
     /**
     * @Route("/payement", name="payement")
     */
    public function index(): Response
    {
        $payement = $this->entityManager->getRepository(Payement::class)->findAll();
        return $this->render('payement/index.html.twig', [
            
        ]);
    }

  /** 
   * @Route("/checkout", name="checkout")
   */ 
    public function checkout($stripeSK): Response
    {
        Stripe::setApiKey($stripeSK);

        $session = Session::create([
            'payement_method_types' => ['card'],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'film',
                        ],
                        'unit_amount'  => 2000,
                    ],
                    'quantity'   => 1,
                ]
            ],
            'mode'                 => 'payment',
            'success_url'          => $this->generateUrl('success_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url'           => $this->generateUrl('cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($session->success-url, 303);
    }

  /*
   * @Route("/success-url", name= "success_url")
 */
    public function successUrl(): Response
    {
        return $this->render('payement/success.html.twig', []);
    }

  /*
   * @Route("/cancel-url", name= "cancel_url")
 */ 
    public function cancelUrl(): Response
    {
        return $this->render('payement/cancel.html.twig', []);
    }
}
