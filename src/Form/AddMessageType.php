<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $date = new \DateTime();
        $builder
            ->add('username',null, ['label' => 'Username', 'required' => true, 'attr' => ['class' => 'form-control']])
            ->add('email',null, ['label' => 'Email', 'required' => true, 'attr' => ['class' => 'form-control']])
            ->add('homepage',null, ['label' => 'Homepage', 'required' => false, 'attr' => ['class' => 'form-control']])
            ->add('captcha',null, ['label' => 'Captcha', 'required' => true, 'attr' => ['class' => 'form-control']])
            ->add('message',null, ['label' => 'Message', 'required' => true, 'attr' => ['class' => 'form-control']])
            ->add('language',null, ['label' => 'Language', 'required' => false, 'attr' => ['class' => 'form-control']])
            ->add('image',null, ['label' => 'Image', 'required' => false, 'attr' => ['class' => 'form-control']])
            ->add('submit', SubmitType::class, ['label' => 'Add message', 'attr' => ['class' => 'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
