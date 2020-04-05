<?php

namespace App\Form;

use App\Entity\NewsNews;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use App\Service;
use App\Entity as Entity;
use App\Form\Type as Type;
use Twig\Extension\SandboxExtension;

class NewsNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,['required'=>true])
            ->add('body', CKEditorType::class)
            ->add('cat',EntityType::class,[
                'class'=> Entity\NewsCat::class,
                'choice_label'=>'catName'
            ])
            ->add('publish',CheckboxType::class, [
                'label_attr' => ['class' => 'switch-custom'],
                'data'=>true
            ])
            ->add('des',TextType::class,['required'=>false])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewsNews::class,
        ]);
    }
}
