<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExamController extends AbstractController
{
    #[Route('/exam/add/{title}/{nb}', name: 'app_exam')]
    public function index(EntityManagerInterface $manager,Request $request,$title,$nb): Response
    {



            $pfe= new Pfe();
            $pfe->setNb($nb);
        $pfe->setTitle($title);

            $manager->persist($pfe);
            $manager->flush();
            $repository = $manager->getRepository(Pfe::class) ;
            $tableau=$repository->findAll();
            $this->addFlash('success', 'Femme ajoutée avec success!');
            return $this->render('index.html.twig', [
                'tableau' => $tableau,
            ]);
        }

    #[Route('/exam/show', name: 'app_exam')]
    public function show(EntityManagerInterface $manager): Response
    {

        $repository = $manager->getRepository(Pfe::class) ;
        $repository = $manager->getRepository(Entreprise::class) ;

        $tableau=$repository->findbyEntreprise();
        return $this->render('show.html.twig', [
            'tableau' => $tableau,
        ]);
    }







}
