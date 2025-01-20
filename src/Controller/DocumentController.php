<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends AbstractController
{
    #[Route('/documents/{filename}', name: 'document_view')]
    public function viewDocument($filename): Response
    {
        $path = $this->getParameter('kernel.project_dir') . '/public/documents/' . $filename;
        
        if (!file_exists($path)) {
            throw $this->createNotFoundException('Le document demandé n\'existe pas');
        }

        return new BinaryFileResponse($path);
    }
}