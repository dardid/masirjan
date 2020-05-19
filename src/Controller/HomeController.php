<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Service;
use App\Entity;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Service\EntityMGR $entityMGR)
    {
        return $this->render('home/home.html.twig', [
            'config' => $entityMGR->findOneBy('App:SysConfig',['configCode'=>1]),
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/staticpages/{url}", name="staticPages")
     */
    public function staticPages($url, Service\EntityMGR $entityMGR)
    {
        $page = $entityMGR->findOneBy('App:StaticPages',['url'=>$url]);
        if(is_null($page))
            throw $this->createNotFoundException('The product does not exist');

        return $this->render('home/staticPage.html.twig', [
            'page' => $page,
        ]);
    }
    /**
     * @Route("/connect", name="pageConnect")
     */
    public function pageConnect()
    {
        return $this->render('home/connect.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}


