<?php

namespace App\Controller;

use App\Entity\RDV;
use App\Repository\RDVRepository;
use App\Form\RDVAddType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class PatientController extends AbstractController
{
    public function __construct(private readonly RDVRepository $rdvRepository) {
    }

    #[Route('/patient', name: 'app_patient')]
    public function index(): Response
    {
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }
    
    #[Route('/patient/addDemande', name: 'app_patient_add_demande')]
    public function addDemande(Request $request): Response
    {
        $rdv = new RDV();
        $form = $this->createForm(RDVAddType::class, $rdv);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->rdvRepository->save($rdv, true);
            $this->addFlash('success', "RDV ajouté avec succès");
        }


        return $this->render('patient/addDemande.html.twig', [
            'formRDV' => $form->createView(),
        ]);
    }


}
