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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

    public function inscription(Request $request, ObjectManager $manager,UserPasswordEncoderInterface $encoder)
    {
        //Création d'un utilisateur vide
        $utilisateur = new User();
        

        $formulaireUtilisateur = $this->createForm(UserType::class, $utilisateur);

        /* On demande au formulaire d'analyser la dernière requete http. Si le tableau POST contenu dans cette requete
        contient des varaibles prenom,nom email, etc... alors la méthode handleRequest() 
        récupère les valeurs de ces varialbes et les affecte à l'objet $ressource*/
        $formulaireUtilisateur->handleRequest($request);

        if ($formulaireUtilisateur->isSubmitted()&& $formulaireUtilisateur->isValid()){

            //Attribuer un role a l'utilisateur
            $utilisateur->setRoles(['ROLE_USER']); // non obligé car fonction get role prend par defaut get-user
            //Encoder le mot de passe d'utilisateur
            $encodagePassword = $encoder->encodePassword($utilisateur, $utilisateur->getPassword());
            $utilisateur->setPassword($encodagePassword);

            //Enregistrer l'utilisateur en base de données
            $manager->persist($utilisateur);
            $manager->flush();
            //Rediriger l'utilisateur vers la page de login
            return $this->redirectToRoute('app_login');

        }

        //Afficher le formulaire d'inscription
        return $this->render('security/inscription.html.twig',['vueFormulaireInscription' => $formulaireUtilisateur->createView()]);
    }
}
