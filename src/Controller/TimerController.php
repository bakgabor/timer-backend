<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TimerController extends AbstractController
{

    /**
     * Matches /api/timer/save exactly
     */
    public function save(
        Request $request
    ) {
        $projectRoot = $this->getParameter('kernel.project_dir');
        file_put_contents("$projectRoot/public/data",$request->getContent());
        return $this->json(['status' => 'ok' ]);
    }

    /**
     * Matches /api/timer/load exactly
     */
    public function load() {
        $projectRoot = $this->getParameter('kernel.project_dir');
        $data = file_get_contents("$projectRoot/public/data");
        $data = json_decode($data, true);
        return $this->json($data);
    }

}