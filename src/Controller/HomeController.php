<?php

namespace App\Controller;

use App\Repository\CampaignRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CampaignRepository $repository): Response

    {
        $campaigns = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'campaigns' => $campaigns,
        ]);
    }

    #[Route('/create', name: 'app_create')]
    public function create(): Response
    {
        return $this->render('home/create.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/payement', name: 'app_payement')]
    public function payement(): Response
    {
        return $this->render('home/payement.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/show', name: 'app_show')]
    public function show(): Response
    {
        return $this->render('home/show.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    

    
}
