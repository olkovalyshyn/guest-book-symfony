<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\AddMessageType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddMessageController extends AbstractController
{
    #[Route('/add_message', name: 'app_add_message')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $message = new Message();
        $message->setDate(new \DateTime());

        $form = $this->createForm(AddMessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($message);
            $entityManager->flush();

            return $this->redirectToRoute('app_list');
        }


        return $this->render('add_message/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
