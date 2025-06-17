<?php

namespace App\Api;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{   
    public function __construct(private CategoriesRepository $categoriesRepository){  }

    public function navbar(): Response
    {
        return $this->render('_partials/menu.html.twig',[
            'categories'=>$this->categoriesRepository->findBy(['parent'=>null]) 
            // change line 16
        ]);
    }
}

?>