<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Form\UserType;

class SecurityController extends AbstractController
{
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    public function logout()
    {
    
    }

    public function inscription(Request $request, ObjectManager $manager)
    {
        //Création d'un utilisateur vide
        $utilisateur = new User();
        

        $formulaireUtilisateur = $this->createForm(UserType::class, $utilisateur);

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles prenom,nom email, etc... alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $ressource*/
        $formulaireUtilisateur->handleRequest($request);

        if ($formulaireUtilisateur->isSubmitted()&& $formulaireUtilisateur->isValid()){

            //Enregistrer l'entreprise en base de données
            //$manager->persist($newEntreprise);
            //$manager->flush();

            //Rediriger l'utilisateur vers la page d'accueil
            return $this->redirectToRoute('proStage');

        }

        //Afficher le formulaire d'inscription
        return $this->render('security/inscription.html.twig',['vueFormulaireInscription' => $formulaireUtilisateur->createView()]);
    }
}
