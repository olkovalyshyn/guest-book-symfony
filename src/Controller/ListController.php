<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/', name: 'app_list')]
    public function index(Request $request, MessageRepository $messageRepository, ManagerRegistry $doctrine, PaginatorInterface $paginator): Response
    {
        $repository = $doctrine->getRepository(Message::class);
        $messages = $repository->findBy([], ['date' => 'DESC']);

//        $paginations = $paginator->paginate(
//            $messageRepository->paginationQuery(),
//            $request->query->get('page', 1),
//            25
//        );

        $user = $this->getUser();
        if ($user) {
            $email = $user->getEmail();
            $messages = $repository->findBy(['email' => $email], ['date' => 'DESC']);
        }

        return $this->render('list/index.html.twig', [
            'messages' => $messages,
//              'messages' => $paginations,

        ]);
    }
}



