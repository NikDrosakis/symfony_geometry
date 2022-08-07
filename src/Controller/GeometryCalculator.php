<?php 
// src/Controller/GeomentryCalculator.php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Circle;
use App\Controller\Triangle;

class GeometryCalculator extends AbstractController
{
	public function list(LoggerInterface $logger): Response
    {
        $logger->info('Look, I just used a service!');

        // ...
    }
	public function area(Request $request,$shape): Response
	{
		dump($shape);
		 //return new Response(json_encode($this->json($radius)));
	}
	
	public function diameter(Request $request,$shape): Response
	{
		 return new Response(json_encode($this->json($radius)));
	}

}
