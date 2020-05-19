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

class AdminController extends AbstractController
{
    /**
     * @Route("/manager/dashboard", name="adminDashboard")
     */
    public function adminDashboard()
    {
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/manager/users/{msg}", name="adminUsers")
     */
    public function adminUsers($msg=0,Service\EntityMGR $entityMGR)
    {
        $users = $entityMGR->findAll('App:SysUser');
        return $this->render('admin/users.html.twig', [
            'users' => $users,
        ]);
    }
    /**
     * @Route("/manager/news/{msg}", name="adminNews")
     */
    public function adminNews($msg=0,Service\EntityMGR $entityMGR)
    {
        $news = $entityMGR->findAll('App:NewsNews');
        return $this->render('admin/news/news.html.twig', [
            'news' => $news,
        ]);
    }
    /**
     * @Route("/manager/new/news", name="adminNewsNew")
     */
    public function adminNewsNew(Request $request,TranslatorInterface $translator,Service\EntityMGR $entityMGR)
    {
        $news = new Entity\NewsNews();
        $form = $this->createForm(Form\NewsNewType::class ,$news);
        $form->handleRequest($request);
        $alert = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $news->setDateSubmit(time());
            $news->setSubmitter($this->getUser());
            $news->setViewCount(0);
            $entityMGR->insertEntity($news);
            return $this->redirectToRoute('adminNews',['msg'=>'1']);
        }
        return $this->render('admin/news/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/manager/edit/news/{id}", name="adminNewsEdit")
     */
    public function adminNewsEdit($id,Request $request,TranslatorInterface $translator,Service\EntityMGR $entityMGR)
    {
        $news = $entityMGR->find('App:NewsNews',$id);
        if(is_null($news))
            return $this->redirectToRoute('404');

        $form = $this->createForm(Form\NewsNewType::class ,$news);
        $form->handleRequest($request);
        $alert = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $news->setDateSubmit(time());
            $news->setSubmitter($this->getUser());
            $news->setViewCount(0);
            $entityMGR->insertEntity($news);
            return $this->redirectToRoute('adminNews',['msg'=>'2']);
        }
        return $this->render('admin/news/newsEdit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/manager/staticpages/list", name="adminStaticPages")
     */
    public function adminStaticPages( Service\EntityMGR $entityMGR)
    {
        $pages = $entityMGR->findAll('App:StaticPages');
        return $this->render('admin/staticPages/archive.html.twig', [
            'pages' => $pages
        ]);
    }

    /**
     * @Route("/manager/staticpages/edit/{id}", name="adminStaticPagesEdit")
     */
    public function adminStaticPagesEdit($id,Request $request,TranslatorInterface $translator,Service\EntityMGR $entityMGR)
    {
        $page = $entityMGR->find('App:StaticPages',$id);
        if(is_null($page))
            return $this->redirectToRoute('404');

        $form = $this->createForm(Form\StaticPageType::class ,$page);
        $form->handleRequest($request);
        $alert = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $entityMGR->update($page);
            return $this->redirectToRoute('adminStaticPages',['msg'=>'1']);
        }
        return $this->render('admin/news/newsEdit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
