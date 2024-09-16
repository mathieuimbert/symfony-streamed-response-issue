<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class StreamController extends AbstractController
{
    #[Route('/stream/issue', name: 'issue')]
    public function issue(): StreamedResponse
    {
        $response = new StreamedResponse();
        $response->setCallback(function () {
            throw new NotFoundHttpException('This is a test exception');
        });
        return $response;
    }

    #[Route('/stream/no-issue', name: 'no-issue')]
    public function noIssue(): StreamedResponse
    {
        throw new NotFoundHttpException('This is a test exception');

        $response = new StreamedResponse();
        $response->setCallback(function () {
            echo 'Response';
        });
        return $response;
    }
}
