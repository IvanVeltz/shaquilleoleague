<?php

namespace App\Controller;

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $teamLogos = [];

        $finder = new Finder();
        $finder->files()->in(__DIR__ . '/../../public/images/logos');

        foreach ($finder as $file) {
            $teamLogos[] = 'images/logos/' . $file->getFilename();
        }

        return $this->render('home/index.html.twig', [
            'teamLogos' => $teamLogos,
        ]);
    }

}
