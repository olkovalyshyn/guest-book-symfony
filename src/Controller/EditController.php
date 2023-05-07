<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    #[Route('/edit/{id}', name: 'app_edit')]
    public function edit(Request $request, ManagerRegistry $doctrine, $id): Response
    {
        $entityManager = $doctrine->getManager();
        $messageRow = $entityManager->getRepository(Message::class)->find($id);

        $formEditMessage = $this->createFormBuilder()
            ->add('message', TextType::class, ['data' => $messageRow->getMessage(), 'attr' => ['class' => 'form-control']])
            ->add('edit', SubmitType::class, ['label' => 'Confirm Edit', 'attr' => ['class' => 'btn btn-primary']])
            ->getForm();
        $formEditMessage->handleRequest($request);

        if ($formEditMessage->isSubmitted() && $formEditMessage->isValid()) {
            $messageRow->setMessage($formEditMessage->get('message')->getData());
            $entityManager->flush();

            return $this->redirectToRoute('app_list');
        }


        return $this->render('edit/index.html.twig', [
            'form' => $formEditMessage->createView(),
        ]);
    }
}
