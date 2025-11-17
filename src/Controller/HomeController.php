<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        // Définit les items de navigation
        $navItems = [
            ['path' => 'app_home', 'label' => 'Home', 'icon' => 'trophy'],
            ['path' => 'app_league', 'label' => "Shaquille O'League", 'icon' => 'trophy'],
            ['path' => 'app_cup', 'label' => "Shaquille O'Cup", 'icon' => 'cup'],
            ['path' => 'app_solo', 'label' => "Shaquille O'Solo", 'icon' => 'user'],
        ];

        return $this->render('base.html.twig', [
            'navItems' => $navItems
        ]);
    }
}
