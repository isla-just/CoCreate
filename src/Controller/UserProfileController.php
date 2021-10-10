<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Form\UserProfileType;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface; 

/**
 * @Route("/users")
 */
class UserProfileController extends AbstractController

{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @Route("/", name="user_profile_index", methods={"GET"})
     */
    public function index(UserProfileRepository $userProfileRepository): Response
    {
        return $this->render('user_profile/index.html.twig', [
            'user_profiles' => $userProfileRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_profile_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userProfile = new UserProfile();
        $form = $this->createForm(UserProfileType::class, $userProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            //get what the user entered and check if entried are the same - validation. render and redirect to error message

            // $this->redirectToRoute('register', ['error'=>true})
            $plainpwd=$userProfile->getPassword();
            $encoded = $this->passwordEncoder->encodePassword($userProfile, $plainpwd);
            // $encoded = $passwordEncoder->encodePassword($userProfile, $plainpwd);
            $userProfile->setPassword($encoded);

            // //setting the profile picture localization
            // $file = $form->getData()['file'];
            // $file->move('/your/path/to/your/file', 'yourFileName');

            $entityManager->persist($userProfile);
            $entityManager->flush();

            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_profile/new.html.twig', [
            'user_profile' => $userProfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_profile_show", methods={"GET"})
     */
    public function show(UserProfile $userProfile): Response
    {
        return $this->render('user_profile/show.html.twig', [
            'user_profile' => $userProfile,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_profile_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserProfile $userProfile): Response
    {
        $form = $this->createForm(UserProfileType::class, $userProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $plainpwd=$userProfile->getPassword();
            $encoded = $this->passwordEncoder->encodePassword($userProfile, $plainpwd);
            $userProfile->setPassword($encoded);

            $entityManager->persist($userProfile);
            $entityManager->flush();

            return $this->redirectToRoute('user_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_profile/edit.html.twig', [
            'user_profile' => $userProfile,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_profile_delete", methods={"POST"})
     */
    public function delete(Request $request, UserProfile $userProfile): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userProfile->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userProfile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_profile_index', [], Response::HTTP_SEE_OTHER);
    }
}
