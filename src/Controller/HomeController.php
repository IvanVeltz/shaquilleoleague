<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(TeamRepository $tr): Response
    {
        $teams = $tr->findBy([], ['name' => 'ASC']);



        return $this->render('home/index.html.twig', [
            'teams' => $teams,
        ]);
    }

}
