<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Service;
use App\Entity;
use App\Form;

class NewsController extends AbstractController
{
    /**
     * @Route("/archive/news", name="newsArchive")
     */
    public function newsArchive(Service\EntityMGR $entityMGR)
    {
        $news = $entityMGR->findAll('App:NewsNews');
        $lastNews = $entityMGR->findByPage('App:NewsNews',1,20);
        return $this->render('news/archive.html.twig', [
            'news' => $news,
            'lastNews'=>$lastNews
        ]);
    }
    /**
     * @Route("/archive/show/news/{url}", name="newsShowNews")
     */
    public function newsShowNews($url, Service\EntityMGR $entityMGR)
    {
        $news = $entityMGR->find('App:NewsNews',$url);
        if(is_null($news))
            return $this->redirectToRoute('404');
        return $this->render('news/showNews.html.twig', [
            'news' => $news
        ]);
    }
}
