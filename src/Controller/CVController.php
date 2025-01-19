<?php

namespace App\Controller;

use App\Form\DownloadCVType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(DownloadCVType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->downloadCV();
        }

        return $this->render('cv/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function downloadCV(): BinaryFileResponse
    {
        $path = $this->getParameter('kernel.project_dir') . '/public/cv/mon-cv.pdf';

        $response = new BinaryFileResponse($path);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'cv-mathis-manie.pdf'
        );

        return $response;
    }
}