<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index()
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController', 'reg_status' => false
        ]);
    }

    /**
     * @param Request $request
     * @Route("/registration/register", name="register")
     * @return JsonResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function registerUser(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return new JsonResponse(false);
        }

        $email =$request->get('email');
        $response = $this->userRepository->checkEmailExists($email);
        if ($response) {
           return $this->redirectToRoute('registration', ['reg_status' => 'Email already exists!']);
        }
        $password = $request->get('password');
        $this->registerNewUser($email, $password);
        return $this->redirectToRoute('app_login', ['reg_status' => 'Registration has been succesfull!']);
    }

    /**
     * @Route("/registration/emailcheck", name="emailcheck")
     * @param Request $request
     * @return JsonResponse
     */
    public function emailValidation(Request $request): JsonResponse
    {
//        if (!$request->isMethod('POST')) {
//            return new JsonResponse('fail');
//        }
        $email = $request->get('email');
        $response = $this->userRepository->checkEmailExists($email);
        return new JsonResponse($response);
    }

    /**
     * @param $email
     * @param $password
     */
    public function registerNewUser($email, $password): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
        $user->setRoles(['ROLE_USER']);
        $entityManager->persist($user);
        $entityManager->flush();
    }
}
