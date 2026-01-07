<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use App\DTO\RDVListDto;
use App\Entity\RDV;
use App\Form\RDVValidType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RDVController extends AbstractController
{
    public function __construct(private readonly RDVRepository $rdvRepository) {
    }

    #[Route('/rdv', name: 'app_rdv')]
    public function index(): Response
    {
        $rdvs = $this->rdvRepository->findAll();
        $rdvsDTO = RDVListDto::fromEntities($rdvs);
        return $this->render('rdv/index.html.twig', [
            'rdvs' => $rdvsDTO
        ]);
    }
    
    #[Route('/rdv/{idRDV}', name: 'app_rdv_accepter')]
    public function accepter(RDV $rdv, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(RDVValidType::class, $rdv);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rdv->setEtatRDV(EtatRDV::ACCEPTEE);
            $em->flush();

            return $this->redirectToRoute('app_rdv');
        }

    return $this->render('rdv/accepter.html.twig', [
        'formRDV' => $form->createView(),
        'rdv' => $rdv,
]);
    }

    
}
