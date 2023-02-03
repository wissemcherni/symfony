<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/show/{name}', name: 'wissem')]
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }
    #[Route('/show/{name}', name: 'wissem')]
    public function showteacher ($name): Response
    { 
        //return new Response ('bonjour '.$name) ; 
    return $this->render('teacher/showTeacher.html.twig', ['name' => $name , ] );
    }
    #[route('/index')]
    public function index_bis():Response 
    {
        return $this->index();
    }
}
