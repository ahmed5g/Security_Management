<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Entity\Reclamations;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\AddReclamationType;





class IndexController extends AbstractController{
    /**
     * @Route("/", name="acceuil")
     */
    public function acceuil(): Response
    {

        return $this->render('index.html.twig');
    }
//    /**
//     * @Route("/clientform", name="clientform")
//     */
//    public function clientform(Request $request, ManagerRegistry $manager): Response
//    {
//
//
//        dump($request);
//        $client = new Client();
//        $reclamation = new Reclamations();
//        if ($request->request->count() > 0){
//            $client = new Client();
//            $reclamation = new Reclamations();
//            $client->setName($request->request->get('name'));
//            $client->setPrenom($request->request->get('prenom'));
//            $client->setEmail($request->request->get('email'));
//            $reclamation->setDescription($request->request->get('description'));
//            $manager->getManager()->persist($client);
//            $manager->getManager()->flush();
//        }
//
//        return $this ->render('Form/clientForm.html.twig');
//    }


    /**
     * @Route("/reclamationform", name="ajouter_reclamation")
     */
    public function addReclamation(Request $request): Response
    {
        $reclamation = new Reclamations();
        $form = $this->createForm(AddReclamationType::class, $reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $reclamation = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reclamation);
            $entityManager->flush();
        }


        return $this->render('Form/ReclamationForm.html.twig', [
            'reclamationForm' => $form->createView()
        ]);
    }

//    /**
//     * @Route("/")
//     */
//    public function reclamation_show(): Response
//    {
//
//        return $this ->render('index.html.twig');
//    }

}