<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Form\FormError;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Request $request, ContactNotification $notification): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            // if($this->captchaverify($request->get('g-recaptcha-response'))){

                $notification->notify($contact);
                return $this->redirectToRoute('homepage', [
                    'success' => true
                ]);
                
            // }else{
            //     $captchaError ='Problème de vérification du captcha. Veuillez réessayer';
            //     $form->addError(new FormError($captchaError));
            // }
        endif;
        
        return $this->render('main/homepage.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cabinet', name: 'clinic')]
    public function clinic(): Response
    {
        return $this->render('main/clinic.html.twig');
    }

    #[Route('/covid', name: 'covid')]
    public function covid(): Response
    {
        return $this->render('main/covid.html.twig');
    }
}
