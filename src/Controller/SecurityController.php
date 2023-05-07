<?php

//ПІСЛЯ ДОДАВАННЯ $form
//namespace App\Controller;
//
//use App\Entity\Message;
//use App\Entity\User;
//use App\Form\LoginType;
//use App\Repository\UserRepository;
//use Doctrine\Persistence\ManagerRegistry;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Bundle\SecurityBundle\Security;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
//use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
//use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
//
//use Symfony\Component\Security\Core\Exception\AuthenticationException;
//use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
////use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
//
//
//class SecurityController extends AbstractController
//
//{
//
//    #[Route('/login', name: 'app_login')]
//    public function login(UserRepository $repository, ManagerRegistry $doctrine, Request $request, AuthenticationUtils $authenticationUtils, UserPasswordHasherInterface $passwordHasher): Response
//    {
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
//
//        $user = new User();
//
//        $form = $this->createForm(LoginType::class, $user);
//        $form->handleRequest($request);
////
////        if ($form->isSubmitted() && $form->isValid()) {
////            // retrieve the user
////            $user = $repository->findOneBy(['email' => $form->getData()['email']]);
////
////            if (!$user) {
////                $this->addFlash('danger', 'Invalid email address');
////            } else {
////                // check the password
////                if ($passwordEncoder->isPasswordValid($user, $form->getData()['password'])) {
////                    // password is valid, authenticate the user
////                    $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
////                    $this->get('security.token_storage')->setToken($token);
////
////                    // trigger the login event
////                    $event = new InteractiveLoginEvent($request, $token);
////                    $this->get('event_dispatcher')->dispatch($event);
////
////                    return $this->redirectToRoute('home');
////                } else {
////                    $this->addFlash('danger', 'Invalid password');
////                }
////            }
////        }
//
//        return $this->render('security/login.html.twig', ['form' => $form->createView(),'last_username' => $lastUsername, 'error' => $error]);
//    }
//
//    /**
//     * @Route("/logout", name="app_logout")
//     */
//    public function logout()
//    {
//        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
//    }
//}


namespace App\Controller;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}


